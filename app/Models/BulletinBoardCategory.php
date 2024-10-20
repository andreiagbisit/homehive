<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BulletinBoardCategory extends Model
{
    use HasFactory, SoftDeletes;

    // Explicitly define the table name
    protected $table = 'bulletin_board_category';

    // Specify which fields are mass assignable
    protected $fillable = ['name', 'hex_code'];

    protected $dates = ['deleted_at'];
}
