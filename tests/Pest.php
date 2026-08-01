<?php

declare(strict_types=1);

use Usernotnull\Toast\Tests\TestCase;

uses(TestCase::class)->in('Feature', 'Unit');

function setEnvironment(string $environment = 'testing'): void
{
    app()->detectEnvironment(fn () => $environment);
}
