<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('clear:all', function () {
    $this->call('cache:clear');
    $this->call('optimize:clear');
    $this->call('config:clear');
    $this->call('route:clear');
    $this->call('view:clear');

    $this->info('All caches cleared');
})->purpose('Clear all application caches');