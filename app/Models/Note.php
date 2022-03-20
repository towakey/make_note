<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'body', 'is_public', 'published_at'
    ];

    protected $casts = [
        'is_public' => 'bool',
        'published_at' => 'datetime'
    ];

    public function getPublishedFormatAttribute()
    {
        return $this->published_at->format('Y-m-d');
    }
    public function getIsPublicLabelAttribute()
    {
        // return config('common.public_status')[$this->is_public];
        return config('common.public_status');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        self::saving(function($note){
            $note->user_id = \Auth::id();
        });
    }
}
