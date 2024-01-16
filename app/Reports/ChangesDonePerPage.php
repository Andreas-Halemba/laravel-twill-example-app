<?php

namespace App\Reports;

use App\StorableEvents\PageRevisionStored;
use Illuminate\Support\Collection;
use Spatie\Analytics\Period;
use Spatie\EventSourcing\EventHandlers\Projectors\EventQuery;
use Spatie\EventSourcing\StoredEvents\Models\EloquentStoredEvent;

class ChangesDonePerPage extends EventQuery
{
    private Collection $allChanges;

    public function __construct(
        private Period $period
    ) {
        $this->allChanges = collect();

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

    public function allChanges(): Collection
    {
        return $this->allChanges;
    }

    protected function applyPageStored(PageRevisionStored $event): void
    {
        $this->allChanges->push([
            'changes' => $event->changedAttributes,
        ]);
    }
}
