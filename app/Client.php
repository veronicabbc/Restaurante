<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'clients';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name', 'lastname', 'phone', 'address', 'description'

    ];


    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
