<?php


namespace App\Misc\Contracts;


interface HasSlug
{
    public function getRouteKeyName();

    public function setSlugAttribute($input);
}
