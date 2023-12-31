<?php

namespace App\Providers;

use Native\Laravel\Contracts\ProvidesPhpIni;
use Native\Laravel\Facades\MenuBar;
use Native\Laravel\Facades\Window;

class NativeAppServiceProvider implements ProvidesPhpIni
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        MenuBar::create()
            ->route('projects.mini')
            ->icon(base_path('resources/icons/DDEVIconTemplate.png'))
            ->width(500)
            ->height(600);

        Window::open()
            ->route('filament.dashboard.resources.projects.index')
            ->width(900)
            ->height(700)
            ->minWidth(300)
            ->minHeight(200)
            ->showDevTools(false);
    }

    /**
     * Return an array of php.ini directives to be set.
     */
    public function phpIni(): array
    {
        return [
        ];
    }
}
