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
        'start_date', 'end_date', 'rooms', 'guests'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }

    public function trip()
    {
        return $this->belongsTo('App\Trip', 'id', 'trip_id');
    }
}
