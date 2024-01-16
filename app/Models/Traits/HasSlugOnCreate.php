<?php

namespace App\Models\Traits;

trait HasSlugOnCreate
{
    public static function bootHasSlugOnCreate(): void
    {
        static::created(function ($model) {
            $model->setSlugs();
        });
    }
}
