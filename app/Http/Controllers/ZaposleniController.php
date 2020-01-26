<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Config;
use App\Korisnik;
use App\ZahtevZaOdmor;

class ZaposleniController extends Controller{


    function view(Request $request){
        // echo $request->route();
        // dd($request->route()->parameters()['id']);
        return view('zaposleni')->with(['korisnikID'=>$request->route()->parameters()['id']]);
    }

    function zahtevZaOdmorom(Request $request){
        $sKorisnikID = $request->input('korisnikID');
        $sDatumOd = $request->input('datumOd');
        $sDatumDo = $request->input('datumDo');

        $cZahtevZaOdmor = new ZahtevZaOdmor();
        $cZahtevZaOdmor->ZaposleniID = $sKorisnikID;
        $cZahtevZaOdmor->DatumOd = $sDatumOd;
        $cZahtevZaOdmor->DatumDo = $sDatumDo;
        $cZahtevZaOdmor->save();

        dd($cZahtevZaOdmor);
    }

}

?>