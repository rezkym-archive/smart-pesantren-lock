<?php

namespace App\DataTables\Teacher\Halaqoh;

use App\Models\HalaqohHistory;
use App\Models\Surah;
use App\Models\Teacher;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;


class HalaqohHistoryDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('Santri', function (HalaqohHistory $user) {
                return $user->students->name;
            })
            ->addColumn('Ayat', function (HalaqohHistory $user) {
                return $user->ayat_start . '-' . $user->ayat_end;
            })
            ->addColumn('Surah', function (HalaqohHistory $user) {
                return $user->surahs->ayat_name;
            })
            ->addColumn('Kelancaran', function (HalaqohHistory $user) {
                switch ($user->fluency_level) {
                    case '50':
                        $fluencyArr = ['warning', 'Cukup'];
                        break;

                    case '75':
                        $fluencyArr = ['primary', 'Lancar'];
                        break;

                    case '100':
                        $fluencyArr = ['success', 'Sangat Lancar'];
                        break;
                    default:
                        $fluencyArr = ['danger', 'Error'];
                        break;
                }
                return '
                <span class="label label-lg font-weight-bold label-light-' . $fluencyArr[0] . ' label-inline">
                    ' . $fluencyArr[1] . '
                </span>';
            })
            ->editColumn('created_at', function ($request) {
                return $request->created_at->format('d-m-Y'); // human readable format
            })
            ->rawColumns(['Kelancaran']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\HalaqohHistory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(HalaqohHistory $model)
    {

        return $model->newQuery($model)
            ->where('teacher_id', Teacher::where('user_id', Auth::id())->first()->id)
            ->with([
                'teachers',
                'students',
                'surahs'
            ]);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('halaqoh-history')
            ->columns($this->getColumns())
            ->minifiedAjax()
            /* ->dom('Bfrtip') */
            ->orderBy([5, 'desc'])
            ->parameters([
                'responsive' => true,
                'autoWidth' => false,
                'lengthChange' => false,
                "language" => [
                    "url" => "//cdn.datatables.net/plug-ins/1.11.3/i18n/id.json"
                ],

            ]);
    }
    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('Santri'),
            Column::make('Ayat'),
            Column::make('Surah'),
            Column::make('Kelancaran'),
            Column::make('comment')->title('Komentar'),
            Column::make('created_at')->title('Tanggal')->visible(true),

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Teacher\Halaqoh\HalaqohHistory_' . date('YmdHis');
    }
}
