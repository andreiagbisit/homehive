<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes; // Import the SoftDeletes trait
use Illuminate\Contracts\Auth\MustVerifyEmail;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes; // Use the SoftDeletes trait;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uname',
        'fname',
        'mname',
        'lname',
        'bdate',
        'email',
        'contact_no',
        'street', 
        'house_blk_no',
        'house_lot_no',
        'password',
        'account_type_id',
        'subdivision_role_id',
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

        // Relationship with the SubdivisionRole model.
    public function subdivisionRole()
    {
        return $this->belongsTo(SubdivisionRole::class, 'subdivision_role_id');
    }

    public function bulletinBoards()
    {
        return $this->hasMany(BulletinBoard::class, 'user_id');
    }



    
}

