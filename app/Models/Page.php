<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;
use App\Models\Traits\HasSlugOnCreate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\Page
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $published
 * @property int|null $position
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \A17\Twill\Models\Block> $blocks
 * @property-read int|null $blocks_count
 * @property-read string $slug
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Revisions\PageRevision> $revisions
 * @property-read int|null $revisions_count
 * @property-write mixed $publish_start_date
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Slugs\PageSlug> $slugs
 * @property-read int|null $slugs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \A17\Twill\Models\Tag> $tags
 * @property-read int|null $tags_count
 * @property-read \App\Models\Translations\PageTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\PageTranslation> $translations
 * @property-read int|null $translations_count
 *
 * @method static Builder|Model accessible()
 * @method static Builder|Model draft()
 * @method static \Database\Factories\PageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Page forFallbackLocaleSlug(string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Page forInactiveSlug(string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Page forSlug(string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Page listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Page mine()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page notTranslatedIn(?string $locale = null)
 * @method static Builder|Model onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Page orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Page orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Page orderByRawByTranslation($orderRawString, $groupByField, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Page orderByTranslation($orderField, $orderType = 'ASC', $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Page ordered()
 * @method static Builder|Model published()
 * @method static Builder|Model publishedInListings()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Page translatedIn(?string $locale = null)
 * @method static Builder|Model visible()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page wherePublished($value)
 * @method static Builder|Model whereTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page withActiveTranslations(?string $locale = null)
 * @method static Builder|Model withTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|Page withTranslation()
 * @method static \Illuminate\Database\Eloquent\Builder|Page withTrashed()
 * @method static Builder|Model withoutTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|Page withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Page extends Model implements Sortable
{
    use HasBlocks, HasFactory, HasPosition, HasRevisions, HasSlug, HasSlugOnCreate, HasTranslation, Notifiable;

    protected $fillable = [
        'published',
        'title',
        'description',
        'position',
    ];

    /**
     * @var string[]
     */
    public $translatedAttributes = [
        'title',
        'description',
        'active',
    ];

    public array $slugAttributes = [
        'title',
    ];
}
