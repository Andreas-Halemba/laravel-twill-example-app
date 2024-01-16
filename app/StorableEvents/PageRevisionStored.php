<?php

namespace App\StorableEvents;

use App\Models\Revisions\PageRevision;
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class PageRevisionStored extends ShouldBeStored
{
    public int $eventModelId;

    public array $changedAttributes;

    public function __construct(public PageRevision $revision)
    {
        $latestTwoRevisions = PageRevision::query()->wherePageId($revision->page_id)->orderByDesc('created_at')->limit(2)->get();
        $this->changedAttributes = arrayRecursiveDiff(
            json_decode($latestTwoRevisions->first()?->payload, true),
            json_decode($latestTwoRevisions->last()?->payload, true)
        );
        $this->eventModelId = $revision->page_id;
    }
}
