<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    protected static function boot()
    {
        parent::boot();

        self::saving(function($note){
            $note->user_id = \Auth::id();
            $note->uuid = (string) Str::orderedUuid();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopePublic(Builder $query)
    {
        return $query->where('is_public', true);
    }

    public function scopePublicList(Builder $query, ?string $tagSlug)
    {
        if($tagSlug){
            $query->whereHas('tags', function($query) use ($tagSlug){
                $query->where('slug', $tagSlug);
            });
        }
        return $query
            ->with('tags')
            ->public()
            ->latest('published_at')
            ->paginate(10);
    }

    public function scopePublicFindById(Builder $query, int $id)
    {
        return $query->public()->findOrFail($id);
    }

    public function scopeSearch(Builder $query, Request $request)
    {
        if($request->anyFilled('title')){
            $query->where('title', 'like', "%$request->title%");
        }
        if($request->anyFilled('user_id')){
            $query->where('user_id', $request->user_id);
        }
        if($request->anyFilled('is_public')){
            $query->where('is_public', $request->is_public);
        }
        if($request->anyFilled('tag_id')){
            $query->whereHas('tags', function($query) use ($request) {
                $query->where('tag_id', $request->tag_id);
            });
        }
        return $query;
    }

    public function getPublishedFormatAttribute()
    {
        return $this->published_at->format('Y-m-d');
    }
    public function getIsPublicLabelAttribute()
    {
        return config('common.public_status')[$this->is_public];
    }
}
