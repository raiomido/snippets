<?php


namespace App\Misc\Decorators;

class MultipleImages extends BaseImage
{
    protected $collection_name = 'images';

    public function getImagesAttribute()
    {
        return [];
    }

    public function getUploadedImagesAttribute()
    {
        return $this->getMedia($this->collection_name)->keyBy('id');
    }

    /**
     * Small thumbnails
     * @return array
     */
    public function getImagesLinksAttribute()
    {
        $images = $this->getMedia($this->collection_name);
        $urls = [];

        if (! count($images)) {
            return $urls;
        }

        foreach ($images as $file) {
            $urls[$file->id] = $file->getUrl();
        }

        return $urls;
    }

    /**
     * Extra Small thumbnails
     * @return array|null
     */
    public function getThumbnailsMdLinksAttribute()
    {
        $images = $this->getMedia($this->collection_name);
        if (! count($images)) {
            return null;
        }
        $html = [];
        foreach ($images as $file) {
            $html[$file->id] = $file->getUrl('thumb_md');
        }

        return $html;
    }

    /**
     * Extra Small thumbnails
     * @return array|null
     */
    public function getThumbnailsSmLinksAttribute()
    {
        $images = $this->getMedia($this->collection_name);
        if (! count($images)) {
            return null;
        }
        $html = [];
        foreach ($images as $file) {
            $html[$file->id] = $file->getUrl('thumb_sm');
        }

        return $html;
    }

    /**
     * @return array|null
     */
    public function getThumbnailsXsLinksAttribute()
    {
        $images = $this->getMedia($this->collection_name);
        if (! count($images)) {
            return null;
        }
        $html = [];
        foreach ($images as $file) {
            $html[$file->id] = $file->getUrl('thumb_xs');
        }

        return $html;
    }
}
