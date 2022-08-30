<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailMskModel;
use App\Models\MasukModel;
use Dompdf\Dompdf;

class DetailMskController extends Controller
{
    public function __construct(){
        $this->DetailMskModel = new DetailMskModel();
        $this->MasukModel = new MasukModel();
    }

    public function printdetailmsk($id_masuk)
    {
        $data =[
            'masuk'=> $this->MasukModel->detailData($id_masuk),
        ];
        return view('v_printdetailmsk', $data);
    }

}