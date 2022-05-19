<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaperWork extends Model
{
    use HasFactory;
    protected $perPage=4 ; 
    protected $guarded=[];
    public function owner(){
        return $this->belongsTo(User::class,'user_id');
    }
}
