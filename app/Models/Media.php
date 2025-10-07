<?php

namespace App\Models;

use Awcodes\Curator\Models\Media as BaseMedia;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Media extends BaseMedia
{
    protected function thumbnailUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getSignedUrl(['w' => 200, 'h' => 200, 'fit' => 'crop'])
        );
    }

    protected function mediumUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getSignedUrl(['w' => 640, 'h' => 640, 'fit' => 'crop'])
        );
    }

    protected function largeUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getSignedUrl(['w' => 1024, 'h' => 1024, 'fit' => 'contain'])
        );
    }
}


