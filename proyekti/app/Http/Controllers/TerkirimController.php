<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TerkirimModel;
use App\Models\MasukModel;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;

class TerkirimController extends Controller
{

    public function __construct()
    {
        $this->TerkirimModel = new TerkirimModel();
        $this->MasukModel = new MasukModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data =[
            'terkirim'=> $this->TerkirimModel->allData(),
        ];
        return view('v_terkirim', $data);
    }

    public function printtkrm()
    {
        $data =[
            'terkirim'=> $this->TerkirimModel->allData(),
        ];
        return view('v_printtkrm', $data);
    }

    public function print_terkirim_per_tgl($tgl_awal, $tgl_akhir)
    {
    $terkirim = DB::table(  'tbl_terkirim')->whereBetween(  'tgl_terkirim',  [$tgl_awal,$tgl_akhir])->get();
    return view( 'v_printtkrm_per_tgl',  compact('terkirim', 'tgl_awal','tgl_akhir'));
    }

    public function detail($id_terkirim)
    {
        if (!$this->TerkirimModel->detailData($id_terkirim)) {
            abort(404);
        }
        $data =[
            'terkirim'=> $this->TerkirimModel->detailData($id_terkirim),
        ];
        return view('v_detailterkirim', $data);
    }

    public function add() 
    {
        $data =[
            'masuk'=> $this->MasukModel->allData(),
        ];
        return view('v_addterkirim',$data);
    }

    public function insert()
    {

        Request()->validate([
            'tgl_terkirim' => 'required',
            'kd_terkirim' => 'required|unique:tbl_terkirim,kd_terkirim|min:4|max:6',
            'barang_terkirim' => 'required',
            'penerima' => 'required',
            'foto_penerima' => 'required|mimes:jpg,jpeg,bmp,png|max:1024',
        ],[
            'tgl_terkirim.required' => 'Wajib Diisi !!',
            'kd_terkirim.required' => 'Wajib Diisi !!',
            'kd_terkirim.unique' => 'Kode Terkirim Ini Sudah Ada !!',
            'kd_terkirim.min' => 'Min 4 Karakter',
            'kd_terkirim.max' => 'Max 5 Karakter',
            'barang_terkirim.required' => 'Wajib Diisi !!',
            'penerima.required' => 'Wajib Diisi !!',
            'foto_penerima.required' => 'Wajib Diisi !!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        //upload gambar/foto 
        $file = Request()->foto_penerima;
        $fileName = Request()->kd_terkirim . '.' . $file->extension();
        $file->move(public_path('foto_penerima'), $fileName);

        $data = [
            'tgl_terkirim' => Request()->tgl_terkirim,
            'kd_terkirim' => Request()->kd_terkirim,
            'barang_terkirim' => Request()->barang_terkirim,
            'penerima' => Request()->penerima,
            'foto_penerima' => $fileName,
        ];

        $this->TerkirimModel->addData($data);
        return redirect()->route('terkirim')->with('pesan','Data Berhasil Di Tambahkan !!');
    }

    public function edit($id_terkirim) 
    {
        if (!$this->TerkirimModel->detailData($id_terkirim)) {
            abort(404);
        }
        $data =[
            'terkirim'=> $this->TerkirimModel->detailData($id_terkirim),
        ];
        return view('v_editterkirim', $data);
    }

    public function update($id_terkirim)
    {

        Request()->validate([
            'tgl_terkirim' => 'required',
            'kd_terkirim' => 'required|min:4|max:6',
            'barang_terkirim' => 'required',
            'penerima' => 'required',
            'foto_penerima' => 'mimes:jpg,jpeg,bmp,png|max:1024',
        ],[
            'tgl_terkirim.required' => 'Wajib Diisi !!',
            'kd_terkirim.required' => 'Wajib Diisi !!',
            'kd_terkirim.min' => 'Min 4 Karakter',
            'kd_terkirim.max' => 'Max 5 Karakter',
            'barang_terkirim.required' => 'Wajib Diisi !!',
            'penerima.required' => 'Wajib Diisi !!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if(Request()->foto_penerima <> "") {
            //jika ingin ganti foto
            //upload gambar/foto 
            $file = Request()->foto_penerima;
            $fileName = Request()->kd_terkirim . '.' . $file->extension();
            $file->move(public_path('foto_penerima'), $fileName);
            $data = [
                'tgl_terkirim' => Request()->tgl_terkirim,
                'kd_terkirim' => Request()->kd_terkirim,
                'barang_terkirim' => Request()->barang_terkirim,
                'penerima' => Request()->penerima,
                'foto_penerima' => $fileName,
            ];

            $this->TerkirimModel->editData($id_terkirim, $data);
        }else{
            //jika tidak ingin ganti foto
            $data = [
                'tgl_terkirim' => Request()->tgl_terkirim,
                'kd_terkirim' => Request()->kd_terkirim,
                'barang_terkirim' => Request()->barang_terkirim,
                'penerima' => Request()->penerima,
            ];
            $this->TerkirimModel->editData($id_terkirim, $data);
        }
        
        return redirect()->route('terkirim')->with('pesan','Data Berhasil Di Update !!');
    }

    public function delete($id_terkirim)
    {
        //hapus atau delete foto
        $terkirim = $this->TerkirimModel->detailData($id_terkirim);
        if ($terkirim->foto_penerima <> "") {
            unlink(public_path('foto_penerima') . '/' . $terkirim->foto_penerima);
        }
        
        $this->TerkirimModel->deleteData($id_terkirim);
        return redirect()->route('terkirim')->with('pesan','Data Berhasil Di Hapus !!');
    }
}