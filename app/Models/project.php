<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;
use App\Models\User ;
use App\Models\Task ;

class project extends Model
{
    protected $fillable =['title' ,'description', 'user_id' , "status"];
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function tasks(){
        return $this->hasMany(Task::class);
    }
        
}
