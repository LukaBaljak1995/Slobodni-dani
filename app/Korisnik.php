<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Korisnik extends Model
{
    //
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Korisnik';

    public function podaciOZaposlenom()
    {
        return $this->hasOne('App\PodaciOKorisniku','KorisnikID','ID');
    }

}