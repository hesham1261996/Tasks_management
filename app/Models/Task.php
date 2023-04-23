<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\project ;

class Task extends Model
{
    use HasFactory;
    protected $fillable =['body' ,"project_id" ,'status']; 
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
