<?php

namespace Controller\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function create()
    {
        $page_title = 'Beranda';
        $page_description = 'Halaman Admin';

        return view('pages.dashboard', compact('page_title', 'page_description'));
    }
}
