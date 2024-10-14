<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulletinBoardCategory extends Model
{
    use HasFactory;

    // Explicitly define the table name to avoid mismatch
    protected $table = 'bulletin_board_category';

    // Specify which fields are mass assignable
    protected $fillable = ['name', 'hex_code'];
}
