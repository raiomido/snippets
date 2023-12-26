<?php


namespace App\Misc\Decorators;

class SingleImage extends BaseImage
{
    protected $collection_name = 'image';
    /**
     * @return string
     */
    public function getImageLinkAttribute()
    {
        $file = $this->getFirstMedia($this->collection_name);
        if (!$file) {
            return url('images/default.jpg');
        }

        return $file->getUrl();
    }

    public function getImageAttribute()
    {
        return $this->getFirstMedia($this->collection_name);
    }
}
