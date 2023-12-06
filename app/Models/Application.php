<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id','app_id','is_public'
    ];
  
    // public function app(){
    //     return $this->belongsTo(App::class,'app_id','id');
    // }
    //    public function app(){
    //     return $this->belongsTo(App::class,'app_id','id');
    // }
}
