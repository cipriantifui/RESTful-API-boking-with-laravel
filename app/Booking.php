<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Booking extends Model
{
    use Notifiable;
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'booking';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'trip_id', 'start_date', 'end_date', 'rooms', 'guests'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function trip()
    {
        return $this->belongsTo('App\Trip', 'trip_id', 'id');
    }
}
