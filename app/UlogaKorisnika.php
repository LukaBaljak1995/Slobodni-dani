<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipUgovora extends Model
{
    //
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'UlogaKorisnika';
    public $incrementing = true;
    protected $primaryKey = 'ID';
    public $timestamps = false;
    
}