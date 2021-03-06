<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZahtevZaOdmor extends Model
{
    //
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ZahtevZaOdmor';
    public $incrementing = true;
    protected $primaryKey = 'ID';
    public $timestamps = false;

    
    public function zaposleni()
    {
        return $this->hasOne('App\Korisnik','ID','ZaposleniID');
    }
}