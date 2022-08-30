<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasukModel;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;

class MasukController extends Controller
{
 
    public function __construct()
    {
        $this->MasukModel = new MasukModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data =[
            'masuk'=> $this->MasukModel->allData(),
        ];
        return view('v_masuk', $data);
    }

    public function printmsk()
    {
        $data =[
            'masuk'=> $this->MasukModel->allData(),
        ];
        return view('v_printmsk', $data);
    }

    public function print_masuk_per_tgl($tgl_awal, $tgl_akhir)
    {
    $masuk = DB::table(  'tbl_masuk')->whereBetween(  'tanggal',  [$tgl_awal,$tgl_akhir])->get();
    return view( 'v_printmsk_per_tgl',  compact('masuk', 'tgl_awal','tgl_akhir'));
    }

    public function detail($id_masuk)
    {
        if (!$this->MasukModel->detailData($id_masuk)) {
            abort(404);
        }
        $data =[
            'masuk'=> $this->MasukModel->detailData($id_masuk),
        ];
        return view('v_detailmasuk', $data);
    }

    public function add() 
    {
        return view('v_addmasuk');
    }

    public function insert()
    {

        Request()->validate([
            'tanggal' => 'required',
            'kd_masuk' => 'required|unique:tbl_masuk,kd_masuk|min:4|max:6',
            'barang_masuk' => 'required',
            'tujuan' => 'required',
            'berat' => 'required',
            'bayar' => 'required',
            'pengirim' => 'required',
            'foto_masuk' => 'required|mimes:jpg,jpeg,bmp,png|max:1024',
        ],[
            'tanggal.required' => 'Wajib Diisi !!',
            'kd_masuk.required' => 'Wajib Diisi !!',
            'kd_masuk.unique' => 'Kode Masuk Ini Sudah Ada !!',
            'kd_masuk.min' => 'Min 4 Karakter',
            'kd_masuk.max' => 'Max 6 Karakter',
            'barang_masuk.required' => 'Wajib Diisi !!',
            'tujuan.required' => 'Wajib Diisi !!',
            'berat.required' => 'Wajib Diisi !!',
            'bayar.required' => 'Wajib Diisi !!',
            'pengirim.required' => 'Wajib Diisi !!',
            'foto_masuk.required' => 'Wajib Diisi !!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        //upload gambar/foto 
        $file = Request()->foto_masuk;
        $fileName = Request()->kd_masuk . '.' . $file->extension();
        $file->move(public_path('foto_masuk'), $fileName);

        $data = [
            'tanggal' => Request()->tanggal,
            'kd_masuk' => Request()->kd_masuk,
            'barang_masuk' => Request()->barang_masuk,
            'tujuan' => Request()->tujuan,
            'berat' => Request()->berat,
            'bayar' => Request()->bayar,
            'pengirim' => Request()->pengirim,
            'foto_masuk' => $fileName,
        ];

        $this->MasukModel->addData($data);
        return redirect()->route('masuk')->with('pesan','Data Berhasil Di Tambahkan !!');
    }

    public function edit($id_masuk) 
    {
        if (!$this->MasukModel->detailData($id_masuk)) {
            abort(404);
        }
        $data =[
            'masuk'=> $this->MasukModel->detailData($id_masuk),
        ];
        return view('v_editmasuk', $data);
    }

    public function update($id_masuk)
    {

        Request()->validate([
            'tanggal' => 'required',
            'kd_masuk' => 'required|min:4|max:6',
            'barang_masuk' => 'required',
            'tujuan' => 'required',
            'berat' => 'required',
            'bayar' => 'required',
            'pengirim' => 'required',
            'foto_masuk' => 'mimes:jpg,jpeg,bmp,png|max:1024',
        ],[
            'tanggal.required' => 'Wajib Diisi !!',
            'kd_masuk.required' => 'Wajib Diisi !!',
            'kd_masuk.min' => 'Min 4 Karakter',
            'kd_masuk.max' => 'Max 6 Karakter',
            'barang_masuk.required' => 'Wajib Diisi !!',
            'tujuan.required' => 'Wajib Diisi !!',
            'berat.required' => 'Wajib Diisi !!',
            'bayar.required' => 'Wajib Diisi !!',
            'pengirim.required' => 'Wajib Diisi !!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if(Request()->foto_masuk <> "") {
            //jika ingin ganti foto
            //upload gambar/foto 
            $file = Request()->foto_masuk;
            $fileName = Request()->kd_masuk . '.' . $file->extension();
            $file->move(public_path('foto_masuk'), $fileName);
            $data = [
                'tanggal' => Request()->tanggal,
                'kd_masuk' => Request()->kd_masuk,
                'barang_masuk' => Request()->barang_masuk,
                'tujuan' => Request()->tujuan,
                'berat' => Request()->berat,
                'bayar' => Request()->bayar,
                'pengirim' => Request()->pengirim,
                'foto_masuk' => $fileName,
            ];

            $this->MasukModel->editData($id_masuk, $data);
        }else{
            //jika tidak ingin ganti foto
            $data = [
                'tanggal' => Request()->tanggal,
                'kd_masuk' => Request()->kd_masuk,
                'barang_masuk' => Request()->barang_masuk,
                'tujuan' => Request()->tujuan,
                'berat' => Request()->berat,
                'bayar' => Request()->bayar,
                'pengirim' => Request()->pengirim,
            ];
            $this->MasukModel->editData($id_masuk, $data);
        }
        
        return redirect()->route('masuk')->with('pesan','Data Berhasil Di Update !!');
    }

    public function delete($id_masuk)
    {
        //hapus atau delete foto
        $masuk = $this->MasukModel->detailData($id_masuk);
        if ($masuk->foto_masuk <> "") {
            unlink(public_path('foto_masuk') . '/' . $masuk->foto_masuk);
        }
        
        $this->MasukModel->deleteData($id_masuk);
        return redirect()->route('masuk')->with('pesan','Data Berhasil Di Hapus !!');
    }
}