<?php

namespace App\Models\Revisions;

use A17\Twill\Models\Revision;

/**
 * App\Models\Revisions\PageRevision
 *
 * @property int $id
 * @property int $page_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property mixed $payload
 * @property-read mixed $by_user
 * @property-read \A17\Twill\Models\User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PageRevision newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageRevision newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageRevision query()
 * @method static \Illuminate\Database\Eloquent\Builder|PageRevision whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageRevision whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageRevision wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageRevision wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageRevision whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageRevision whereUserId($value)
 *
 * @mixin \Eloquent
 */
class PageRevision extends Revision
{
    protected $table = 'page_revisions';

    protected $dispatchesEvents = [
        'saved' => \App\StorableEvents\PageRevisionStored::class,
    ];
}
