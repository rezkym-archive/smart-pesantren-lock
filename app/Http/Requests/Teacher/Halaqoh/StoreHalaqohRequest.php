<?php

namespace App\Http\Requests\Teacher\Halaqoh;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreHalaqohRequest extends FormRequest
{
    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = false;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $havePermission = $this->user()->hasPermissionTo('halaqoh_teacher');
        return $havePermission && true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (request()->isMethod('POST')) {
            $rules = [
                'student'  => 'required',
                'surah' => 'required',
                'ayat_start' => 'required|integer',
                'ayat_end'  => 'required|integer',
                'fluency_level' => ['required', Rule::in(['50', '75', '100'])],
                'comment'   => 'required|max:250'
            ];
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'student.required' => 'Nama santri belum dipilih.',
            'surah.required' => 'Surah belum dipilih.',
            'ayat_start.required'   => 'Ayat awal harus di isi',
            'ayat_end.required'   => 'Ayat akhir harus di isi',
            'fluency_level.required' => 'Tingkat kelancaran belum dipilih.',
            'comment.required'  => 'Santri belum diberikan komentar.',

            'fluency_level.in'  => 'Tingkat kelancaran tidak tersedia.',

            'comment.max'       => 'Komentar maksimal 250 kata'
        ];
    }
}
