<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\sliderModel;
// use App\productModel;
// use App\categoryModel;
use App\brandProductModel;

class slider extends Controller
{
    public function test(){
    //echo Carbon::now('Asia/Ho_Chi_Minh');
     Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.
    $dt = Carbon::create(2019, 1, 23, 10, 40, 16);
    $dt2 = Carbon::create(2019, 1, 24, 13, 40, 16);
    $now = Carbon::now();
    echo $dt->diffForHumans($now); //12 phút trước
    echo $dt2->diffForHumans($now); //1 giờ trước
    // $dataProduct = productModel::findOrFail(1);
    // $dataSlider = sliderModel::all();
    // $datacategory = brandProductModel::find(1);
    //     // echo "<pre>";
    //     // var_dump($dataSlider);
    //     return view('test',['datacategory' => $datacategory]);
    }
    public function addSlider(){
        $dataBrand = brandProductModel::all();
        return view('admin.sliderAction.addslider',['dataBrand' => $dataBrand]);
    }
    public function postAddSlider(Request $request){
        $dataSlider = new sliderModel;
        $dataSlider->titleslider = $request->titleslider;
        $dataSlider->id_brand = $request->namebrand;
        if ($request->hasFile('imgslider')) {
            $fileRequest = $request->file('imgslider');
            $typeFile = $fileRequest->getClientOriginalExtension();
            if ($typeFile !="jpg" && $typeFile != "png" && $typeFile != "jpeg" ) {
                return back()->with('notifyError','File not Valid');
            }
            $nameFile = $fileRequest->getClientOriginalName();
            $nameFileToSave = str_random(5).'-'.$nameFile;
            $dataSlider->imageslider = $nameFileToSave;
            $fileRequest->move('images/slider/',$nameFileToSave);
        }
        else{
            return back()->with('notifyErrorUpload','Please Upload Images Slider');
        }
        $dataSlider->save();
        return back()->with('notifysuccess','Add Slider Successfully');
    }
    public function listSlider(){
        $dataSlider = sliderModel::all();
        // echo "<pre>";
        // var_dump($dataSlider);
        return view('admin.sliderAction.listslider',['dataSlider' => $dataSlider]);
    }
    public function deleteSlider($id_sli){
        $dataSliderDelete = sliderModel::findOrFail($id_sli);
        $dataSliderDelete->delete();
        unlink('images/slider/'.$dataSliderDelete->imageslider);
        return redirect('admin/SliderAction/ListSlider')->with('notifyDelete','Delete Slider Successfully');
    }
    public function editSlider($id_sli){
        $dataBrand = brandProductModel::all();
        $dataOneSlider = sliderModel::findOrFail($id_sli);
        return view('admin.sliderAction.editslider',['dataOneSlider' => $dataOneSlider,'dataBrand' => $dataBrand]);
    }
    public function postEditSlider(Request $request){
        $id_sli = $request->id_sli;
        $dataOneSlider = sliderModel::findOrFail($id_sli);
        $oldimage1 = $request->oldimgslider;
        $dataOneSlider->titleslider = $request->titleslider;
        $dataOneSlider->id_brand = $request->namebrand;
        if ($request->hasFile('imgslider')) {
            $fileRequest = $request->file('imgslider');
            $typeFile = $fileRequest->getClientOriginalExtension();
            if ($typeFile !="jpg" && $typeFile != "png" && $typeFile != "jpeg" ) {
                return back()->with('notifyError','File not Valid');
            }
            $nameFile = $fileRequest->getClientOriginalName();
            $nameFileToSave = str_random(5).'-'.$nameFile;
            $dataOneSlider->imageslider = $nameFileToSave;
            unlink('images/slider/'.$oldimage1);
            $fileRequest->move('images/slider/',$nameFileToSave);
        }
        else{
            $dataOneSlider->imageslider = $request->oldimgslider;
        }
        $dataOneSlider->save();
        return redirect('admin/SliderAction/ListSlider')->with('notifysuccess','Edit Slider Successfully');
    }
}
