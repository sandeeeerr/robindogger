<?php

namespace App\Models;

use Awcodes\Curator\Models\Media as BaseMedia;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Media extends BaseMedia
{
    protected function url(): Attribute
    {
        // Always return direct storage URL (public disk) instead of private or temp URL
        return Attribute::make(
            get: fn () => \Illuminate\Support\Facades\Storage::disk($this->disk)->url($this->path)
        );
    }

    protected function thumbnailUrl(): Attribute
    {
        // Use the original file URL to avoid Glide
        return Attribute::make(get: fn () => $this->url);
    }

    protected function mediumUrl(): Attribute
    {
        // Use the original file URL to avoid Glide
        return Attribute::make(get: fn () => $this->url);
    }

    protected function largeUrl(): Attribute
    {
        // Use the original file URL to avoid Glide
        return Attribute::make(get: fn () => $this->url);
    }
}


