<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $table = 'inventories';


  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [

    'quantity', 'operation_type_id', 'product_id'


  ];

  public function operation()
  {
    return $this->belongsTo(OperationType::class);
  }

  public function products()
  {
    return $this->belongsToMany(Product::class);
  }

  public function billings()
  {
    return $this->hasMany(Billing::class);
  }
}
