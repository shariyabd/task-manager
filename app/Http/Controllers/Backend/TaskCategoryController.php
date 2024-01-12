<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskCategoryController extends Controller
{
    public function create(){
        return view('backend.category.create-category');
    }

    public function categoryManage(){
       return view('backend.category.category-manage');
    }
}
