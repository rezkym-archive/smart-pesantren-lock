<?php

namespace Controllers\Admin\Kesantrian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentPermission extends Controller
{
    public function create()
    {
        return view('admin.kesantrian.student-permission');
    }
}
