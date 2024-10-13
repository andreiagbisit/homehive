<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubdivisionRole extends Model
{
    use HasFactory;

    // Explicitly specify the table name to match your schema
    protected $table = 'subdivision_role';

    // Mass-assignable attributes
    protected $fillable = ['name'];

    // Define the relationship: One role has many users
    public function users()
    {
        return $this->hasMany(User::class, 'subdivision_role_id');
    }
}
