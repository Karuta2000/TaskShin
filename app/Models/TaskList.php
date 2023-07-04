<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TaskList extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id', 'color_id'];


    protected function defaultAttributes()
    {
        return [
            'title' => 'New list',
            'user_id' => Auth::id(),
            'color_id' => Auth::user()->preferences->color_id,
        ];
    }


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
