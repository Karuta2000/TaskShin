<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'google_id',
        'description'
    ];

    protected $primaryKey = 'id';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function profile(){
        return $this->hasOne(ProfileSettings::class);
    }

    public function preferences(){
        return $this->hasOne(UserPreferences::class);
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function notes(){
        return $this->hasMany(Note::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function tags(){
        return $this->hasMany(Tag::class);
    }

    public function registrationDate(){
        $created = $this->attributes['created_at'];
        $created = Carbon::createFromDate($created);
        $registrationDate = $created->format('d/m/Y');
        return $registrationDate;
    }

    public function sinceRegistration(){
        $created = $this->attributes['created_at'];
        $timeSinceRegistration = Carbon::parse($created)->diffForHumans(null, null, false, 1, null);
        return $timeSinceRegistration;
    }


}
