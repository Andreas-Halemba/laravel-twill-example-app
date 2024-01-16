<?php

namespace App\Models\Slugs;

use A17\Twill\Models\Model;

/**
 * App\Models\Slugs\PageSlug
 *
 * @property int $id
 * @property int $page_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $slug
 * @property string $locale
 * @property int $active
 * @property-write mixed $publish_start_date
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \A17\Twill\Models\Tag> $tags
 * @property-read int|null $tags_count
 *
 * @method static Builder|Model accessible()
 * @method static Builder|Model draft()
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug newQuery()
 * @method static Builder|Model onlyTrashed()
 * @method static Builder|Model published()
 * @method static Builder|Model publishedInListings()
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug query()
 * @method static Builder|Model visible()
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug whereSlug($value)
 * @method static Builder|Model whereTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug whereUpdatedAt($value)
 * @method static Builder|Model withTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug withTrashed()
 * @method static Builder|Model withoutTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug withoutTrashed()
 *
 * @mixin \Eloquent
 */
class PageSlug extends Model
{
    protected $table = 'page_slugs';
}
