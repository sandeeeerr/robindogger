<?php

namespace App\Models;

use App\Filament\Resources\PostResource;
use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'rows',
        'image_id',  // Dit veld kan zowel voor afbeeldingen als video's gebruikt worden
        'user_id',
        'is_published',
        'published_at',
        'services',
        'year',
        // Voeg hier extra velden toe als nodig, bijvoorbeeld 'content', 'full_width', etc.
    ];

    protected $casts = [
        'rows' => 'array',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Koppel de featured media (afbeelding of video) via het veld image_id.
     */
    public function media()
    {
        return $this->belongsTo(Media::class, 'image_id');
    }

    /**
     * Controleer of de gekoppelde media een video is.
     *
     * @return bool
     */
    public function getIsVideoAttribute()
    {
        return $this->media && Str::startsWith($this->media->type, 'video/');
    }

    /**
     * Haal de URL op van de gekoppelde media (afbeelding of video).
     *
     * @return string|null
     */
    public function getMediaUrlAttribute()
    {
        return $this->media ? $this->media->url : null;
    }

    /**
     * Retourneer de URL naar het post.
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return route('post.show', $this);
    }

    /**
     * Retourneer de edit URL.
     *
     * @return string
     */
    public function getEditUrlAttribute()
    {
        return PostResource::getUrl('edit', ['record' => $this]);
    }

    /**
     * Retourneer een excerpt van de description.
     *
     * @return string
     */
    public function getExcerptAttribute()
    {
        return Str::limit($this->description, 160); 
    }

    /**
     * Scope voor gepubliceerde posts.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope voor concepten.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDrafts($query)
    {
        return $query->where('is_published', false);
    }
}
