<?php

use App\Models\Page;

beforeAll(function () {
    ray('clear')->clearAll();
});

beforeEach(function () {
    ray('each')->red();
});

it('can generate page slug', function (Page $page) {
    ray($page, $page->getSlug());
})->with(function () {
    yield fn () => Page::factory()->make();
    yield fn () => Page::factory()->create();
})->only();
