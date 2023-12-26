<?php


namespace App\Misc\Decorators;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class BaseImage extends Model  implements HasMedia
{
    protected $appends = ['thumb_xs_link', 'thumb_sm_link', 'thumb_md_link'];
    protected $collection_name = 'image';

    use InteractsWithMedia {
        InteractsWithMedia::addMedia as parentAddMedia;
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb_xs')
            ->width(300)
            ->height(157)
            ->performOnCollections($this->collection_name);

        $this->addMediaConversion('thumb_sm')
            ->width(600)
            ->height(314)
            ->performOnCollections($this->collection_name);

        $this->addMediaConversion('thumb_md')
            ->width(1200)
            ->height(628)
            ->performOnCollections($this->collection_name);
    }

    /**
     * @return string
     */
    public function getThumbXsLinkAttribute()
    {
        $url = $this->getFirstMediaUrl($this->collection_name, 'thumb_xs');
        if (!$url) {
            return url('images/default.jpg');
        }

        return $url;
    }

    /**
     * @return string
     */
    public function getThumbSmLinkAttribute()
    {
        $url = $this->getFirstMediaUrl($this->collection_name, 'thumb_sm');
        if (!$url) {
            return url('images/default.jpg');
        }

        return $url;
    }

    /**
     * @return string
     */
    public function getThumbMdLinkAttribute()
    {
        $url = $this->getFirstMediaUrl($this->collection_name, 'thumb_md');
        if (!$url) {
            return url('images/default.jpg');
        }

        return $url;
    }
}
