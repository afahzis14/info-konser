<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pages = PageContent::all();
        $pageCount = $pages->count();
        
        return view('admin.dashboard', compact('pages', 'pageCount'));
    }
}
