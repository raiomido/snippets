<?php


namespace App\Misc\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait InteractsWithSlug
{
    protected $_routeKeyName = 'slug';

    /**
     * use slug where appropriate
     * @return string
     */
    public function getRouteKeyName()
    {
        return $this->_routeKeyName;
    }

    /**
     * Set slug attribute
     * @param $input
     */
    public function setSlugAttribute($input)
    {
        if ($input) {
            $slug = Str::slug($input);
            do {
                $this->attributes[$this->_routeKeyName] = $slug;
                $exists = Model::where($this->_routeKeyName, $slug)->where('id', '!=', $this->id)->exists();
                $slug = Str::slug($input) . mt_rand(10, 10000);
            } while ($exists);
        }
    }
}
