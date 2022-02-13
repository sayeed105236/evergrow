<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\UserPayment;



class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
      'name',
      'user_name',
      'email',

      'number',
      'gender',
      'country',
      'sponsor',
      'position',
      'password',
      'placement_id',
      'left_count',
      'right_count',
      'left_side',
      'right_side',
      'status',
      'referral_token',


    ];
    /**
 * The accessors to append to the model's array form.
 *
 * @var array
 */


/**
 * Get the user's referral link.
 *
 * @return string
 */
public function getReferralLinkAttribute()
{
    return $this->referral_link = route('register', ['ref' => $this->user_name]);
}

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url','referral_link',
    ];
    public function sponsors()
    {
        return $this->belongsTo(User::class,'sponsor');
    }
    public function placements()
    {
        return $this->hasMany(User::class,'placement_id','user_name');
    }
    public function childs()
    {
        return $this->hasMany(User::class,'parent_id');
    }
    // recursive, loads all descendants
    public function position()
    {
        return $this->hasMany(User::class,'placement_id','user_name');
    }
    public function childrenRecursive()
    {
        return $this->position()->with('childrenRecursive');
    }
    public function UserPayment()
    {
        return $this->belongsTo(UserPayment::class,'user_id');
    }
    public function referrals()
{
    return $this->hasMany(User::class, 'sponsor', 'id');
}

}
