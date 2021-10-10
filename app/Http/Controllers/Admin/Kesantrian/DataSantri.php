<?php

namespace Controllers\Admin\Kesantrian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataSantri extends Controller
{
    public function create()
    {
        return view('admin.kesantrian.data-santri');
    }
}
