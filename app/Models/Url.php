<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;
    protected $fillable = [
        'code','app_id', 'app_url','image'
    ];
    public function app(){
        return $this->belongsTo(App::class,'app_id','id');
    }


}
