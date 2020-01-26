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
        $sIDKorisnika = $request->route()->parameters()['id'];
        $aZahteviKorisnika = ZahtevZaOdmor::select('ID','DatumOd','DatumDo', 'Odobreno')
                                                ->where("ZaposleniID",'=',$sIDKorisnika)
                                                ->get();

        return view('zaposleni')->with(['korisnikID'=>$sIDKorisnika, 'zahteviKorisnika'=>$aZahteviKorisnika]);
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

        // dd($cZahtevZaOdmor);
        // $aZahteviKorisnika = ZahtevZaOdmor::select('ID','DatumOd','DatumDo', 'Odobreno')
        // ->where("ZaposleniID",'=',$sIDKorisnika)
        // ->get();

        return back();
        // return redirect()->view('zaposleni')->with(['korisnikID'=>$sKorisnikID, 'zahteviKorisnika'=>$aZahteviKorisnika]);
        
    }

}

?>