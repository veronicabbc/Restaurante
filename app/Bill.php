<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table  = 'bills';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = 
    [
        'quantity','amount','total','client_id','inventory_id'
    
    ];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
