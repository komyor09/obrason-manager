<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    // Связь с компанией
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Связь с ролью
    public function role()
    {
        return $this->belongsTo(UserRole::class, 'role_id');
    }

    // Удобные проверки ролей
    public function isAdmin()
    {
        return $this->role?->name === 'admin';
    }

    public function isCompanyOwner()
    {
        return $this->role?->name === 'company_owner';
    }

    public function isCustomer()
    {
        return $this->role?->name === 'customer';
    }
}
