<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str; // Add this for code generation

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'referral_code', // Add this
        'points',        // Add this
        'role',          // Add this
    ];

    /**
     * Auto-generate referral code on creation
     */
    protected static function booted()
    {
        static::creating(function ($user) {
            // Generates a unique code like SINO-ABCD
            if (empty($user->referral_code)) {
                $user->referral_code = 'SINO-' . strtoupper(Str::random(6));
            }
            
            // Set default role if not provided
            if (empty($user->role)) {
                $user->role = 'affiliate';
            }
        });
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}