<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulletinBoardEntry extends Model
{
    use HasFactory;

    // Specify the table if it's different from the model name
    protected $table = 'bulletin_board';

    // Define which fields are fillable via mass assignment
    protected $fillable = ['post_date', 'title', 'category_id', 'description'    ];
    
    protected $casts = [
        'post_date' => 'datetime',
    ];

    // Define the relationship to the BulletinBoardCategory model
    public function category()
    {
        return $this->belongsTo(BulletinBoardCategory::class, 'category_id')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getPostDateForCalendarAttribute()
    {
        return $this->post_date ? $this->post_date->format('Y-m-d') : null;
    }

    

}
