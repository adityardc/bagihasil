<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class bagihasilController extends Controller
{
	public function refresh()
	{
		return captcha_img('flat');
	}

    public function cari(Request $request)
    {
    	$validator = Validator::make(request()->all(), [
			'kode_captcha' => 'captcha|required|max:4',
			'kode_spta'    => 'required'
        ]);

        if($validator->fails()){
            return back()->with('captcha-salah', "Kode Captcha salah atau semua kolom harus diisi !")->withInput();
        }else{
        	$noSpta = $request->pg."-".$request->kode_spta;
	        if($request->pg == "IF30"){
	        	$data = DB::connection('mysql_pan')->table('t_spta')
	        			->select('t_spta.no_spat', 'sap_petani.nama_petani', 't_spta.kode_blok', 't_timbangan.netto_final', 't_ari.rendemen_ari', 't_ari.gula_ptr', 't_ari.tetes_ptr', 't_meja_tebu.kondisi_tebu')
	        			->leftJoin('sap_petani', 't_spta.id_petani_sap', '=', 'sap_petani.id_petani_sap')
	        			->leftJoin('t_timbangan', 't_spta.id', '=', 't_timbangan.id_spat')
	        			->leftJoin('t_ari', 't_spta.id', '=', 't_ari.id_spta')
	        			->leftJoin('t_meja_tebu', 't_spta.id', '=', 't_meja_tebu.id_spta')
	        			->where('t_spta.no_spat', $noSpta)->first();
	        }elseif($request->pg == "IF32"){
	        	$data = DB::connection('mysql_sra')->table('t_spta')
	        			->select('t_spta.no_spat', 'sap_petani.nama_petani', 't_spta.kode_blok', 't_timbangan.netto_final', 't_ari.rendemen_ari', 't_ari.gula_ptr', 't_ari.tetes_ptr', 't_meja_tebu.kondisi_tebu')
	        			->leftJoin('sap_petani', 't_spta.id_petani_sap', '=', 'sap_petani.id_petani_sap')
	        			->leftJoin('t_timbangan', 't_spta.id', '=', 't_timbangan.id_spat')
	        			->leftJoin('t_ari', 't_spta.id', '=', 't_ari.id_spta')
	        			->leftJoin('t_meja_tebu', 't_spta.id', '=', 't_meja_tebu.id_spta')
	        			->where('t_spta.no_spat', $noSpta)->first();
	        }elseif($request->pg == "IF33"){
	        	$data = DB::connection('mysql_ren')->table('t_spta')
	        			->select('t_spta.no_spat', 'sap_petani.nama_petani', 't_spta.kode_blok', 't_timbangan.netto_final', 't_ari.rendemen_ari', 't_ari.gula_ptr', 't_ari.tetes_ptr', 't_meja_tebu.kondisi_tebu')
	        			->leftJoin('sap_petani', 't_spta.id_petani_sap', '=', 'sap_petani.id_petani_sap')
	        			->leftJoin('t_timbangan', 't_spta.id', '=', 't_timbangan.id_spat')
	        			->leftJoin('t_ari', 't_spta.id', '=', 't_ari.id_spta')
	        			->leftJoin('t_meja_tebu', 't_spta.id', '=', 't_meja_tebu.id_spta')
	        			->where('t_spta.no_spat', $noSpta)->first();
	        }elseif($request->pg == "IF34"){
	        	$data = DB::connection('mysql_mjo')->table('t_spta')
	        			->select('t_spta.no_spat', 'sap_petani.nama_petani', 't_spta.kode_blok', 't_timbangan.netto_final', 't_ari.rendemen_ari', 't_ari.gula_ptr', 't_ari.tetes_ptr', 't_meja_tebu.kondisi_tebu')
	        			->leftJoin('sap_petani', 't_spta.id_petani_sap', '=', 'sap_petani.id_petani_sap')
	        			->leftJoin('t_timbangan', 't_spta.id', '=', 't_timbangan.id_spat')
	        			->leftJoin('t_ari', 't_spta.id', '=', 't_ari.id_spta')
	        			->leftJoin('t_meja_tebu', 't_spta.id', '=', 't_meja_tebu.id_spta')
	        			->where('t_spta.no_spat', $noSpta)->first();
	        }else{
	        	$data = DB::connection('mysql_tas')->table('t_spta')
	        			->select('t_spta.no_spat', 'sap_petani.nama_petani', 't_spta.kode_blok', 't_timbangan.netto_final', 't_ari.rendemen_ari', 't_ari.gula_ptr', 't_ari.tetes_ptr', 't_meja_tebu.kondisi_tebu')
	        			->leftJoin('sap_petani', 't_spta.id_petani_sap', '=', 'sap_petani.id_petani_sap')
	        			->leftJoin('t_timbangan', 't_spta.id', '=', 't_timbangan.id_spat')
	        			->leftJoin('t_ari', 't_spta.id', '=', 't_ari.id_spta')
	        			->leftJoin('t_meja_tebu', 't_spta.id', '=', 't_meja_tebu.id_spta')
	        			->where('t_spta.no_spat', $noSpta)->first();
	        }

	        if($data == NULL){
	        	return back()->with('gak-ketemu', "SPTA : ".$noSpta." tidak ditemukan !");
	        }else{
	        	return view('hasil', compact(['data']));
	        	// return back()->with('ketemu', "SPTA nomor : ".$request->pg."-".$request->kode_spta);
	        }
        }
    }
}
