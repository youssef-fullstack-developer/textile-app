<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state',
        'code',
        'description',
        'city',
        'pin',
        'status'
    ];



    public function get_state(){
        return $this->hasOne(State::class, 'id', 'state');
    }
    public function get_city(){
        return $this->hasOne(City::class, 'id', 'city');
    }
}
