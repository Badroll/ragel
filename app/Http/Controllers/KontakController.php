<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;
use App\Models\Transaksi;
use Session, DB;

class KontakController extends Controller
{
    public function __construct(){
    }


    public function index(Request $request){
        $kontak = Kontak::all();

        $data["kontak"] = $kontak;
        return view("kontak.index", $data);
    }


    public function create(Request $request){
        $nama = $request->{"nama"};
        $jenis = $request->{"jenis"};
        $keterangan = $request->{"keterangan"};
        if(!$nama || !$jenis || !$keterangan){
            return redirect(url("kontak"))->with("error", "Inputan tidak valid");
        }
        $kontak = new Kontak;
        $kontak->nama = $nama;
        $kontak->jenis = $jenis;
        $kontak->keterangan = $keterangan;
        $kontak->save();
        
        return redirect(url("kontak"))->with("success", "Kontak berhasil disimpan");
    }


    public function riwayat(Request $request){
        $id = $request->{"id"};
        if(!$id){
            return redirect(url("kontak"))->with("error", "ID tidak valid");
        }
        $lastData = Kontak::find($id);
        if(!$lastData){
            return redirect(url("kontak"))->with("error", "Kontak tidak ditemukan");
        }

        $riwayat = DB::select("
            SELECT A.*, B.nama as barang_nama, B.satuan as barang_satuan, C.nama as kategori_nama
            FROM transaksi as A
            JOIN barang as B ON A.barang_id = B.id
            JOIN kategori as C ON B.kategori_id = C.id
            WHERE A.kontak_id = ?    
        ", [$id]);
        foreach($riwayat as $k => $v){
            $v->{"total"} = $v->{"jumlah"} * $v->{"harga"};
        }

        $data["riwayat"] = $riwayat;
        $data["kontak"] = $lastData;
        return view("kontak.riwayat", $data);
    }


    public function form(Request $request){
        $id = $request->{"id"};
        if(!$id){
            return view("kontak.form");
        }

        $lastData = Kontak::find($id);
        if(!$lastData){
            return redirect(url("kontak"))->with("error", "Kontak tidak ditemukan");
        }

        $data["kontak"] = $lastData;
        return view("kontak.form", $data);
    }


    public function update(Request $request){
        $id = $request->{"id"};
        $nama = $request->{"nama"};
        $jenis = $request->{"jenis"};
        $keterangan = $request->{"keterangan"};
        if(!$id || !$nama || !$jenis || !$keterangan){
            return redirect(url("kontak"))->with("error", "Inputan tidak valid");
        }

        $lastData = Kontak::find($id);
        if(!$lastData){
            return redirect(url("kontak"))->with("error", "Kontak tidak ditemukan");
        }

        if($nama != $lastData->{"nama"}){
            $cekDuplikat = Kontak::where("nama", $nama)->where("id", "!=", $id)->get();
            if(count($cekDuplikat) > 0){
                return redirect(url("kontak"))->with("error", "Nama kontak '".$nama."' sudah digunakan");
            }
        }
        $lastData->nama = $nama;
        $lastData->jenis = $jenis;
        $lastData->keterangan = $keterangan;
        $lastData->save();
        
        return redirect(url("kontak"))->with("success", "Kontak berhasil diperbarui");
    }


    public function delete(Request $request){
        $id = $request->{"id"};
        if(!$id){
            return redirect(url("kontak"))->with("error", "Inputan tidak valid");
        }

        $lastData = Kontak::find($id);
        if(count($lastData->get()) == 0){
            return redirect(url("kontak"))->with("error", "kontak tidak ditemukan");
        }

        $lastData->delete();

        return redirect(url("kontak"))->with("success", "kontak berhasil dihapus");
    }

}
