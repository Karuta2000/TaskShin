<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserPreferences extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'color_id', 'priority', 'project_id', 'setDate', 'projectSortBy', 'imageSortBy', 'taskSortBy'];


    protected function defaultAttributes()
    {
        return [
            'color_id' => 1,
            'priority' => 1,
            'user_id' => Auth::id(),
            'project_id' => null,
            'setDate' => true,
            'projectSortBy' => 'name',
            'imageSortBy' =>'created_at',
            'taskSortBy' => 'updated_at'
        ];
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function color()
    {
        $this->belongsTo(Color::class);
    }

    public function project()
    {
        $this->belongsTo(Project::class);
    }
}
