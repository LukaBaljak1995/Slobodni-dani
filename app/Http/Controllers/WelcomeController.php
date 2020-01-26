<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Config;
use App\Korisnik;

class WelcomeController extends Controller{


    function login(Request $request){
        $sUsername = $request->input('username');
        $sPassword = $request->input('password');
        $cKorisnik =  Korisnik::where('Username', $sUsername)
            ->where('Password', $sPassword)
            ->first();
        if(!isset($cKorisnik)){
            return redirect('/');
        }
        $iIDKorisnika = $cKorisnik->ID;
        if($cKorisnik->TipKorisnikaID==Config::get('constants.TipKorisnika.Administrator')){
            return redirect('/admin/'.$iIDKorisnika);
        } else {
            return redirect('/zaposleni/'.$iIDKorisnika);
        }
    }

}

?>