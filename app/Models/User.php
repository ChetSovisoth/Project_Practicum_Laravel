<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Mchev\Banhammer\Traits\Bannable;
use Overtrue\LaravelFollow\Traits\Followable;
use Overtrue\LaravelFollow\Traits\Follower;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, Bannable, Followable, Follower;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'role',
        'bio',
        'avatar',
        'email',
        'password',
        'uuid',
        'dark_mode'
    ];

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function getProfilePicture() {
        return "/storage/users-avatar/" . Auth::user()->avatar;
    }

    public static function getProfilePictureByAvatar($avatar)
    {
        // Assuming 'profile_picture' is the name of the column storing the picture file name
        return "/storage/users-avatar/" . $avatar;
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function mentor()
    {
        return $this->hasOne(Mentor::class);
    }

    public function group()
    {
        return $this->hasMany(Group::class);
    }

}
