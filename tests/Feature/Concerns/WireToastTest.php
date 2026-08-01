<?php

declare(strict_types=1);

use Livewire\Livewire;
use Usernotnull\Toast\Livewire\ToastComponent;
use Usernotnull\Toast\Tests\Fixtures\Livewire\WireToastHarness;
use Usernotnull\Toast\ToastManager;

use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

it('only pulls toasts when x-toasts is missing', function () {
    ToastManager::setComponentRendered(false);

    toast()
        ->info('test')
        ->push();

    assertTrue(ToastManager::hasPendingToasts());

    Livewire::test(WireToastHarness::class)
        ->assertDispatched('toast', function ($name, $params) {
            return $name === 'toast'
                && $params['message'] === 'test'
                && $params['title'] === null
                && $params['type'] === 'info'
                && $params['duration'] === config('tall-toasts.duration');
        });

    assertFalse(ToastManager::hasPendingToasts());

    Livewire::test(ToastComponent::class);

    toast()
        ->info('test')
        ->push();

    assertTrue(ToastManager::hasPendingToasts());

    Livewire::test(WireToastHarness::class)
        ->assertNotDispatched('toast');

    assertTrue(ToastManager::hasPendingToasts());

    ToastManager::setComponentRendered(false);
});

it('dispatches toast events with the pending notification payload', function () {
    ToastManager::setComponentRendered(false);

    Livewire::test(WireToastHarness::class)
        ->call('queueToast', 'Toast <b>message</b>', 'Toast title')
        ->assertDispatched('toast', function ($name, $params) {
            return $name === 'toast'
                && $params['message'] === htmlspecialchars('Toast <b>message</b>', ENT_QUOTES)
                && $params['title'] === 'Toast title'
                && $params['type'] === 'success'
                && $params['duration'] === config('tall-toasts.duration');
        });
});

it('does not dispatch toast events when the toast component has already rendered', function () {
    ToastManager::setComponentRendered(true);

    Livewire::test(WireToastHarness::class)
        ->call('queueToast')
        ->assertNotDispatched('toast');

    assertTrue(ToastManager::hasPendingToasts());

    ToastManager::setComponentRendered(false);
});
