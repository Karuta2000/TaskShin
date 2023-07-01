<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileSettings extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'banner', 'sex', 'description', 'birthday', 'color_id'];


    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function gender()
    {
        if ($this->attributes['sex'] == "Male") {
            return "<div class='fw-bolder' style='color: #4D9DE0'><i class='fa fa-mars' aria-hidden='true'></i> " . $this->attributes['sex'] . "</div>";
        }
        if ($this->attributes['sex'] == "Female") {
            return "<div class='fw-bolder' style='color: #F4BFDB'><i class='fa fa-venus' aria-hidden='true'></i> " . $this->attributes['sex'] . "</div>";
        } else {
            return $this->attributes['sex'];
        }
    }

    public function age()
    {
        $age = Carbon::parse($this->birthday)->age;
        if($age > 1){
            return $age . ' years old';
        }
        else {
            return $age . ' year old';
        }
    }

    public function birthDate(){
        $birthday = $this->attributes['birthday'];
        $birthday = Carbon::createFromDate($birthday);
        $birthDate = $birthday->format('d/m/Y');
        return $birthDate;
    }
}
