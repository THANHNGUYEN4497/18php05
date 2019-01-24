<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoryModel;

class categoryPro extends Controller
{
    public function test(){
        echo "entered";
    }
    public function addCategory(){
        return view('admin.category.addcate');
    }
    public function postAddCategory(Request $reuest){
        $category = new categoryModel;
        $category->titleCate = $reuest->category;
        $category->save();
        return back()->with('addcate','Add Category Successfully');
    }
    public function listCategory(){
        $dataCategory = categoryModel::all();
        return view('admin.category.listCate',['dataCategory' => $dataCategory]);
    }
    public function deleteCategory($id_cate){
        $dataCategory = categoryModel::find($id_cate);
        $dataCategory->delete();
        return back()->with('delecate','Delete Category Successfully');
    }
    public function editCategory($id_cate){
        $dataOneCate = categoryModel::find($id_cate);
        return view('admin.category.editCate',['dataOneCate' => $dataOneCate]);
    }
    public function postEditCategory(Request $request){
        $id_cate = $request->id;
        $dataCategory = categoryModel::find($id_cate);
        $dataCategory->titleCate = $request->category;
        $dataCategory->save();
        return redirect('admin/CategoryAction/ListCategory')->with('editcate','Edit Category Successfully');
    }
}
