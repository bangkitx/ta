<?php

namespace App\Http\Controllers;

//use App\Models\Barang;
//use App\Models\Pesanan;
//use App\Models\PesananDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Auth;
use Carbon\Carbon;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
    	// $baranglist = Barang::where('id', $id)->first();
        $baranglist = DB::table ('barangs')
        ->where('id', $id)
        ->first();
    	return view('pesan.index', ['barangid' => $baranglist ]);
    }
    public function pesan(Request $request, $id)
    {
    	//$baranglist = Barang::where('id', $id)->first();
        $baranglist = DB::table ('barangs')
        ->where('id', $id)
        ->first();
        $tanggal = Carbon::now();

    	//validasi apakah melebihi stok
    	if($request->jumlah_pesan > $baranglist->stok)
    	{
    		return redirect('pesan/'.$id);
    	}

    	//cek validasi
    	//$cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $cek_pesanan = DB::table ('pesanans')
        ->where('user_id', Auth::user()->id)
        ->where('status',0)
        ->first();

    	//simpan ke database pesanan
    	if(empty($cek_pesanan))
    	{
            $cek_pesanan = DB::table ('pesanans')
            ->updateOrInsert(
                ['user_id' => Auth::user()->id ,
                'tanggal' =>  $tanggal ,
                'status' => (0) ,
                'jumlah_harga' => $baranglist->harga*$request->jumlah_pesan,
                'kode' => mt_rand(100, 999) ]
            );
            //$pesanan = new Pesanan;
	    	//$pesanan->user_id = Auth::user()->id;
	    	//$pesanan->tanggal = $tanggal;
	    	//$pesanan->status = 0;
	    	//$pesanan->jumlah_harga = 0;
            //$pesanan->kode = mt_rand(100, 999);
	    	//$pesanan->save();
    	}


    	//simpan ke database pesanan detail
    	//$pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan_baru = DB::table ('pesanans')
        ->where('user_id', Auth::user()->id)
        ->where('status',0)
        ->first();

    	//cek pesanan detail
    	//$cek_pesanan_detail = PesananDetail::where('barang_id', $baranglist->id)->where('pesanan_id', $pesanan_baru->id)->first();
        $cek_pesanan_detail = DB::table ('pesanan_details')
        ->where('barang_id', $baranglist->id)
        ->where('pesanan_id', $pesanan_baru->id)
        ->first();

    	if(empty($cek_pesanan_detail))
    	{
            $cek_pesanan_detail = DB::table ('pesanan_details')
            ->updateOrInsert(
                ['barang_id' => $baranglist->id ,
                'pesanan_id' =>  $pesanan_baru->id ,
                'jumlah' => $request->jumlah_pesan ,
                'jumlah_harga' => $baranglist->harga*$request->jumlah_pesan ]
            );
            //$pesanan_detail = new PesananDetail;
	    	//$pesanan_detail->barang_id = $baranglist->id;
	    	//$pesanan_detail->pesanan_id = $pesanan_baru->id;
	    	//$pesanan_detail->jumlah = $request->jumlah_pesan;
	    	//$pesanan_detail->jumlah_harga = $baranglist->harga*$request->jumlah_pesan;
	    	//$pesanan_detail->save();
    	}else
    	{
    		$pesanan_detail = DB::table ('pesanan_details')
            ->where('barang_id', $baranglist->id)
            ->where('pesanan_id', $pesanan_baru->id)
            ->first();

    		$pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_pesan;

    		//harga sekarang
    		$harga_pesanan_detail_baru = $baranglist->harga*$request->jumlah_pesan;
	    	$pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
	    	// $pesanan_detail->update();
    	}

    	//jumlah total
    	$pesanan = DB::table ('pesanans')
        ->where('user_id', Auth::user()->id)
        ->where('status',0)
        ->first();

    	$pesanan->jumlah_harga = $pesanan->jumlah_harga+$baranglist->harga*$request->jumlah_pesan;
    	//$pesanan->update();

    	return redirect('dashboard');

    }
    public function checkout()
    {
        $data = DB::table('pesanan_details')
            ->select(["pesanan_details.*", "barangs.*", "pesanan_details.id as pesanan_detail_id"])
            ->join('barangs', 'barangs.id', '=', 'pesanan_details.barang_id')
            ->get();


        $total_harga = 0;
        foreach ($data as $pesanan_detail) {
            $total_harga += $pesanan_detail->jumlah_harga;
        }

        return view('pesan.checkout')->with(['pesanan_details' => $data, 'total_harga' => $total_harga]);
    }

    public function bayar()
    {
        $data = DB::table('pesanan_details')
            ->select(["pesanan_details.", "barangs.", "pesanan_details.id as pesanan_detail_id"])
            ->join('barangs', 'barangs.id', '=', 'pesanan_details.barang_id')
            ->where('user_id', Auth::user()->id)
            ->get();


        $total_harga = 0;
        foreach ($data as $pesanan_detail) {
            $total_harga += $pesanan_detail->jumlah_harga;
        }

        return view('pesan.checkout')->with(['pesanan_details' => $data, 'total_harga' => $total_harga]);
    }

    public function hapus($id)
    {
        DB::delete('DELETE FROM pesanan_details WHERE id =  :id', ['id' => $id]);
        return redirect()->route('checkout')->with('success', 'Data berhasil dihapus');
    }


}
