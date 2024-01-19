<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;
class TaskCategoryController extends Controller
{
    public function create(){
        return view('backend.category.create-category');
    }

    public function categoryManage(Request $request){
        if ($request->ajax()) {
            $data = Category::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
       
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
       return view('backend.category.category-manage');
    }

    public function store(Request $request){
        
      $data =  $request->validate([
            'name' => 'required',
            'slug' => ''
        ]);

       $category =  Category::create($data);

       if($category){
        return "success";
       }else{
        return "faild";
       }
    }
}
