<?php

namespace App\Reports;

use App\StorableEvents\PageRevisionStored;
use Illuminate\Support\Collection;
use Spatie\Analytics\Period;
use Spatie\EventSourcing\EventHandlers\Projectors\EventQuery;
use Spatie\EventSourcing\StoredEvents\Models\EloquentStoredEvent;

class ChangesDonePerPage extends EventQuery
{
    private array $allChanges = [];

    public function __construct(
        private Period $period
    ) {
        EloquentStoredEvent::query()
            ->whereEvent(PageRevisionStored::class)
            ->whereDate(
                'created_at',
                '>=',
                $this->period->startDate
            )
            ->whereDate(
                'created_at',
                '<=',
                $this->period->endDate
            )
            ->each(
                fn (EloquentStoredEvent $event) => $this->apply($event->toStoredEvent())
            );
    }

    public function getAllChanges(): Collection
    {
        return collect($this->allChanges);
    }

    protected function applyPageRevisionStored(PageRevisionStored $event): void
    {
        ray($event);
        foreach ($event->changedAttributes as $attributeName => $attributeValue) {
            $this->allChanges[$event->eventModelId] = array_merge($this->allChanges[$event->eventModelId] ?? [], [$attributeName => $attributeValue]);
        }
    }
}
