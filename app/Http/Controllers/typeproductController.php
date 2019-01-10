<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\proModel;
class typeproductController extends Controller
{
    public function addpro(){
        return view('admin.product.addpro');
    }
    public function postaddpro(Request $request) {
        $datapro = new proModel;
        $datapro->title = $request->title;
        $datapro->save();
        return redirect('admin/UserAction/AddPro')->with('notify','Add pro successlly!!');
    }
    public function getdata(){
        $datapro = proModel::all()->toArray();
        return view('admin.product.listpro',['datapro' => $datapro ]);
    }
}
