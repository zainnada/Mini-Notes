<?php
it('Validates a string', function () {
   expect(\Core\Validator::string(' hello '))->toBeTrue()
       ->and(\Core\Validator::string(false))->toBeFalse()
       ->and(\Core\Validator::string(''))->toBeFalse();
});

it('Validates a string with a minimum length', function () {
   expect(\Core\Validator::string(' hello ',6))->toBeFalse();
});

it('Validates an email', function () {
   expect(\Core\Validator::email('foobar'))->toBeFalse()
       ->and(\Core\Validator::email('foobar@example.com'))->toBeTrue();
});

it('validates that a number given is greater than amount', function () {
    expect(\Core\Validator::greaterThan(1, -1))->toBeTrue()
        ->and(\Core\Validator::greaterThan(1, 4))->toBeFalse()
        ->and(\Core\Validator::greaterThan(4, 4))->toBeFalse();
})->only();

