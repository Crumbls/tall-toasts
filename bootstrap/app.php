<?php

declare(strict_types=1);

/* This file is required for phpstan */
$app = include __DIR__ . '/../vendor/orchestra/testbench-core/laravel/bootstrap/app.php';

$app->register(\Livewire\LivewireServiceProvider::class);
$app->register(\Usernotnull\Toast\ToastServiceProvider::class);

$app->afterResolving('view', function (\Illuminate\View\Factory $view): void {
    $view->addLocation(__DIR__ . '/../tests/views');
});

return $app;
