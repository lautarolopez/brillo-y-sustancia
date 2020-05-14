<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Address extends Model
{
    protected $table ='addresses';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
