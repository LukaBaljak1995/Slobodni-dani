<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Config;
use App\Korisnik;
use App\ZahtevZaOdmor;
use DB;

class AdministratorController extends Controller{


    function view(Request $request){
        // echo $request->route();
        // dd($request->route()->parameters()['id']);
        DB::enableQueryLog(); 
        $sIDAdmina = $request->route()->parameters()['id'];
        $aZahteviKorisnika = ZahtevZaOdmor::select()
                                            ->with( array( 'zaposleni', 'zaposleni.podaciOZaposlenom','zaposleni.podaciOZaposlenom.tipUgovora','zaposleni.podaciOZaposlenom.godisnjiOdmori' ))  
                                            // ;
                                            ->get();
                                            // ->toSql();
                                            // ->first();

        // dd($aZahteviKorisnika);
        // return view('admin')->with(['korisnikID'=>$sIDKorisnika, 'zahteviKorisnika'=>$aZahteviKorisnika]);
        // $cKorisnik = $aZahteviKorisnika->zaposleni();
        // dd($aZahteviKorisnika);
        
        // dd(DB::getQueryLog());
        return view('admin')->with(['adminID'=>$sIDAdmina, 'zahteviKorisnika'=>$aZahteviKorisnika]);
    }

    function odobriGodisnjiOdmor(Request $request){
        
        $sIDZahteva = $request->route()->parameters()['id'];
        $cZahtevZaOdmor = ZahtevZaOdmor::with( array( 'zaposleni', 'zaposleni.podaciOZaposlenom','zaposleni.podaciOZaposlenom.tipUgovora','zaposleni.podaciOZaposlenom.godisnjiOdmori' )) 
                 ->where('ID',"=",$sIDZahteva)
                 ->first();
                 var_dump($cZahtevZaOdmor->DatumDo);
        $iTrazeniBrojDana = (new \DateTime($cZahtevZaOdmor->DatumOd))->diff( new \DateTime($cZahtevZaOdmor->DatumDo))->d;
        
        $cGodisnjiOdmorIzPrethodne = $cZahtevZaOdmor->zaposleni->podaciOZaposlenom->godisnjiOdmori[1];
        $cGodisnjiOdmorIzTekuce = $cZahtevZaOdmor->zaposleni->podaciOZaposlenom->godisnjiOdmori[0];
        
        if(strtotime($cZahtevZaOdmor->datumOd)<strtotime(date('Y')."-"."06-30")){
            echo "Jeste pre!";
            
            if($cGodisnjiOdmorIzPrethodne->BrojDana>0){
                $cGodisnjiOdmorIzPrethodne->BrojDana -= $iTrazeniBrojDana;
            } else {
                $cGodisnjiOdmorIzTekuce->BrojDana -= $iTrazeniBrojDana;
            }
            // dd($cZahtevZaOdmor->zaposleni->podaciOZaposlenom->godisnjiOdmori[0]);
        } else {
            $cGodisnjiOdmorIzTekuce->BrojDana -= $iTrazeniBrojDana;
            echo "Nije pre!";
        }
        

        $cZahtevZaOdmor->Odobreno=1;
        // $cZahtevZaOdmor->save();

        // $cGodisnjiOdmorIzPrethodne->save();
        // $cGodisnjiOdmorIzTekuce->save();

        dd($cZahtevZaOdmor);

        return back();
    }


    function postojeLiDrugiZahteviSaIstomUlogom($sDatumOd, $sDatumDo, $sUlogaID){

    }

}

?>