<?php

namespace App\Projectors;

use App\StorableEvents\PageRevisionStored;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class PageChangesProjector extends Projector
{
    public function onPageStored(PageRevisionStored $event): void
    {
    }
}
