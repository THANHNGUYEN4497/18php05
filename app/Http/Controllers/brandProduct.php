<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoryModel;
use App\brandProductModel;

class brandProduct extends Controller
{
    public function addBrand(){
        $datacate = categoryModel::all();
        return view('admin.brandproduct.addbrand',['datacate' => $datacate]);
    }
    public function postAddBrand(Request $reuest){
        $brand = new brandProductModel;
        $brand->namebrand = $reuest->brandpro;
        $brand->id_cate = $reuest->catepro;
        $brand->save();
        return back()->with('addbrand','Add BrandProduct Successfully');
    }
    public function listBrand(){
        $databrand = brandProductModel::all();
        return view('admin.brandproduct.listBrand',['databrand' => $databrand]);
    }
    public function deleteBrand($id_brand){
        $dataCategory = brandProductModel::find($id_brand);
        $dataCategory->delete();
        return back()->with('delebrand','Delete Brand Successfully');
    }
    public function editBrand($id_brand){
        $dataOneBrand = brandProductModel::find($id_brand);
        $dataCate = categoryModel::all();
        return view('admin.brandproduct.editbrand',['dataOneBrand' => $dataOneBrand,'dataCate' => $dataCate]);
    }
    public function postEditBrand(Request $request){
        $id_brand = $request->id;
        $databrand = brandProductModel::find($id_brand);
        $databrand->namebrand = $request->namebrand;
        $databrand->id_cate = $request->catepro;
        $databrand->save();
        return redirect('admin/BrandAction/ListBrand')->with('editbrand','Edit Brand Successfully');
    }
}
