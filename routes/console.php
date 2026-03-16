<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('demo:about', function () {
    $this->comment('MacroActive demo app: creator ops, engineering workflow, and release pipeline walkthroughs.');
})->purpose('Display the MacroActive demo summary');
