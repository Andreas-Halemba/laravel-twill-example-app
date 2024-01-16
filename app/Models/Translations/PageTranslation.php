<?php

namespace App\Models\Translations;

use A17\Twill\Models\Model;
use App\Models\Page;

/**
 * App\Models\Translations\PageTranslation
 *
 * @property int $id
 * @property int $page_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $locale
 * @property int $active
 * @property string|null $title
 * @property string|null $description
 * @property-write mixed $publish_start_date
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \A17\Twill\Models\Tag> $tags
 * @property-read int|null $tags_count
 *
 * @method static Builder|Model accessible()
 * @method static Builder|Model draft()
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation newQuery()
 * @method static Builder|Model onlyTrashed()
 * @method static Builder|Model published()
 * @method static Builder|Model publishedInListings()
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation query()
 * @method static Builder|Model visible()
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation wherePageId($value)
 * @method static Builder|Model whereTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereUpdatedAt($value)
 * @method static Builder|Model withTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation withTrashed()
 * @method static Builder|Model withoutTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation withoutTrashed()
 *
 * @mixin \Eloquent
 */
class PageTranslation extends Model
{
    /**
     * @var class-string<\App\Models\Page>
     */
    protected $baseModuleModel = Page::class;
}
