<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = "tasks";
    protected $fillable = ['title','description','due_date','user_id'];
    public function users(){
        return $this->belongsTo(User::class,'uder_id');
    }
}
