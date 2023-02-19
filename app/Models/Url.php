<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Url extends Model
{
    use HasFactory;
    protected $fillable = [
        'code','client_id','app_id', 'app_url','description','image'
    ];
    public function app(){
        return $this->belongsTo(App::class,'app_id','id');
    }
    // public function client(){
    //     return $this->belongsTo('public.app_::class,'client_id','id');
    // }


}
