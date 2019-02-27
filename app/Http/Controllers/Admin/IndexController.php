<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index()
    {
    	// return 1;
    	return view('admin/index',['title'=>'用户首页']);
    }  
}
