<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'operation_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'operation', 'description'
    ];
  
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

}
