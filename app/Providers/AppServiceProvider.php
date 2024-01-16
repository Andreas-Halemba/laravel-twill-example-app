<?php

namespace App\Providers;

use A17\Twill\Facades\TwillAppSettings;
use A17\Twill\Services\Settings\SettingsGroup;
use A17\Twill\View\Components\Navigation\NavigationLink;
use Illuminate\Support\ServiceProvider;
use Spatie\EventSourcing\Facades\Projectionist;
use TwillNavigation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Projectionist::addProjectors([
            \App\Projectors\PageChangesProjector::class,
        ]);
        TwillNavigation::addLink(
            NavigationLink::make()->forModule('pages')
        );
        TwillNavigation::addLink(
            NavigationLink::make()->forRoute('twill.settings', ['section' => 'general'])->title('Settings')
        );

        TwillAppSettings::registerSettingsGroup(
            SettingsGroup::make()
                ->name('site-settings')
                ->label('Site settings') // Example access control.
        );
    }
}
