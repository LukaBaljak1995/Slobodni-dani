<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PodaciOKorisniku extends Model
{
    //
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'PodaciOKorisniku';
    public $incrementing = true;
    protected $primaryKey = 'ID';
    public $timestamps = false;
    
    public function tipUgovora()
    {
        return $this->hasOne('App\TipUgovora','ID','TipUgovoraID');
    }

    public function godisnjiOdmori()
    {
        return $this->hasMany('App\GodisnjiOdmor','ZaposleniID','ID')->orderBy('Godina','DESC');
    }

}