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
    return $this->belongsTo(OperationType::class, 'operation_type_id', 'id');
  }

  public function product()
  {
    return $this->belongsTo(Product::class, 'product_id', 'id');
  }

  public function billings()
  {
    return $this->hasMany(Billing::class);
  }
}
