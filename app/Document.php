<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
         'types','cin','is_it_find','user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
