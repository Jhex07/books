<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'number_id',
        'name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    protected $appends = ['full_name'];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d'
        // 'is_enable' => 'boolean' //0-1:true, false
    ];



    // Accessor (get)

    public function getFullNameAttribute(){
        return "{$this->name} {$this->last_name}";
    }

    /*Mutadores*/

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function setRememberTokenAttribute()
    {
        $this->attributes['remember_token'] = Str::random(30);
    }


    public function customerLends()
    {
        return $this->hasMany(Lend::class, 'customer_user_id', 'id ');
    }


    public function owenerLends()
    {
        return $this->hasMany(Lend::class, 'owner_user_id', 'id');
    }
}
