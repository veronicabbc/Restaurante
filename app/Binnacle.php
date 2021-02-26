<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Binnacle extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'binnacles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'ip', 'date', 'accion', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    public function getDateAttribute($value)
    {
        return Carbon::createFromFormat(
            'Y-m-d H:i:s',
            Carbon::parse($value)->toDateTimeString()
        )->format('d-m-Y h:i A');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
