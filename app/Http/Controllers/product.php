<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoryModel;
use App\brandProductModel;
use App\productModel;

class product extends Controller
{
    public function getdatabrand($id_cate){
        $dataBrand = brandProductModel::where('id_cate',$id_cate)->get();
        //$dataBrand = array('dataBrand' => $dataBrand );
        // echo "<pre>";
        // var_dump($dataBrand);
        foreach ($dataBrand as  $value) {
            echo "<option value='".$value->id."'>".$value->namebrand."</option>";
        }
    }
    public function addProduct(){
        $dataCategory = categoryModel::all();
        $dataBrand = brandProductModel::all();
        return view('admin.product.addpro',['dataCategory' => $dataCategory,'dataBrand' => $dataBrand]);
    }
    public function postAddProduct(Request $request){
        $productInfo = new productModel;
        // $productInfo2 = $request->except('imagespro');
        // echo "<pre>";
        // var_dump($productInfo2);
        $productInfo->namepro = $request->namepro;
        $productInfo->pricepro = $request->pricepro;
        $productInfo->salepro = $request->salepro;
        $productInfo->contentpro = $request->contentpro;
        $productInfo->statuspro = $request->statuspro;
        $productInfo->id_brand = $request->brandpro;
        $productInfo->id_cate = $request->catepro;
        if ($request->hasFile('imagespro')) {
            $imgprorRequest = $request->file('imagespro');
            $imgproType = $imgprorRequest->getClientOriginalExtension();
            if ($imgproType != "jpg" && $imgproType != "png" && $imgproType != "jpeg" ) {
                return back()->with('imaErro','Images Not valid');
            }
            $imgproName = $imgprorRequest->getClientOriginalName();
            $imgproNameSave = str_random(5).'-'.$imgproName;
            $productInfo->imagePro = $imgproNameSave;
            $imgprorRequest->move('images/product/',$imgproNameSave);
        }
        else{
            $productInfo->imagePro = "not Images";
        }
        $productInfo->save();
        return back()->with('notifyAdd','Add Data Product Successfully');
    }
    public function listProduct(){
        $dataProduct = productModel::all();
        return view('admin.product.listpro',['dataproduct' => $dataProduct]);
    }
    public function deleteProduct($id_pro){
        $dataDelete = productModel::find($id_pro);
        unlink('images/product/'.$dataDelete->imagePro);
        $dataDelete->delete();
        return back()->with('notifyDelete','Delete Data Phone Successfully');
    }
    public function editProduct($id_pro){
        $dataOneProduct = productModel::find($id_pro);
        $dataBrand = brandProductModel::all();
        $dataCate = categoryModel::all();
        return view('admin.product.editpro',['dataBrand' => $dataBrand,'dataCate' => $dataCate,'dataOneProduct' => $dataOneProduct]);
    }
    public function postEditProduct(Request $request){
        $id_pro = $request->id_pro;
        $dataOneProduct = productModel::find($id_pro);
        $dataOneProduct->namepro = $request->namepro;
        $dataOneProduct->pricepro = $request->pricepro;
        $dataOneProduct->salepro = $request->salepro;
        $dataOneProduct->contentpro = $request->contentpro;
        $dataOneProduct->statuspro = $request->statuspro;
        $dataOneProduct->id_brand = $request->brandpro;
        $dataOneProduct->id_cate = $request->catepro;
        if ($request->hasFile('newImage')) {
            $oldImage = $request->oldImage;
            $newFileImage = $request->file('newImage');
            $typeNewFileImage = $newFileImage->getClientOriginalExtension();
            if ($typeNewFileImage != "jpg" && $typeNewFileImage !="png" && $typeNewFileImage != "jpeg" ) {
                return back()->with('imageError','Images Not Valid');
            }
            $newFileImageSave =str_random(5).'_'. $newFileImage->getClientOriginalName();
            $dataOneProduct->imagePro = $newFileImageSave;
            $newFileImage->move('images/product/',$newFileImageSave);
            unlink('images/product/'.$oldImage);
        }
        else{
            $oldImage = $request->oldImage;
            $dataOneProduct->imagePro = $oldImage;
        }
        $dataOneProduct->save();
         return redirect('admin/ProductAction/ListProduct')->with('editSuccess','Edit Data Successfully!!');
    }
}
