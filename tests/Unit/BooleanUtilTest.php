<?php

use Agcodex\EnumHelper\BooleanUtil;

describe('Support for Backed Enums', function () {
    enum TestBackedEnum: string
    {
        use BooleanUtil;

        case ONE = 'one';
        case TWO = 'two';
    }

    it('should return true if same enum object (is)', function () {
        expect(TestBackedEnum::ONE->is(TestBackedEnum::ONE))->toBeTrue();
    });

    it('should return false if not same enum object (is)', function () {
        expect(TestBackedEnum::ONE->is(TestBackedEnum::TWO))->toBe(false);
    });

    it('should return true if same enum value (is)', function () {
        expect(TestBackedEnum::ONE->is('one'))->toBeTrue();
    });

    it('should return false if not same enum value (is)', function () {
        expect(TestBackedEnum::ONE->is('two'))->toBe(false);
    });

    // BooleanUtil `isNot` method

    it('should return true if not same enum object (isNot)', function () {
        expect(TestBackedEnum::ONE->isNot(TestBackedEnum::TWO))->toBeTrue();
    });

    it('should return false if same enum object (isNot)', function () {
        expect(TestBackedEnum::ONE->isNot(TestBackedEnum::ONE))->toBeFalse();
    });

    it('should return true if not same enum value (isNot)', function () {
        expect(TestBackedEnum::ONE->isNot('two'))->toBeTrue();
    });

    it('should return false if same enum value (isNot)', function () {
        expect(TestBackedEnum::ONE->isNot('one'))->toBeFalse();
    });
});

describe('Support for Unit Enums', function () {
    enum TestUnitEnum
    {
        use BooleanUtil;

        case ONE;
        case TWO;
    }

    it('should return true if same enum object (is)', function () {
        expect(TestUnitEnum::ONE->is(TestUnitEnum::ONE))->toBeTrue();
    });

    it('should return false if not same enum object (is)', function () {
        expect(TestUnitEnum::ONE->is(TestUnitEnum::TWO))->toBeFalse();
    });

    it('should return true if same enum value (is)', function () {
        expect(TestUnitEnum::ONE->is('ONE'))->toBeTrue();
    });

    it('should return false if not same enum value (is)', function () {
        expect(TestUnitEnum::ONE->is('TWO'))->toBeFalse();
    });

    it('should return false if same enum object (isNot)', function () {
        expect(TestUnitEnum::ONE->isNot(TestUnitEnum::ONE))->toBeFalse();
    });

    it('should return true if not same enum object (isNot)', function () {
        expect(TestUnitEnum::ONE->isNot(TestUnitEnum::TWO))->toBeTrue();
    });

    it('should return false if same enum value (isNot)', function () {
        expect(TestUnitEnum::ONE->isNot('ONE'))->toBeFalse();
    });

    it('should return true if not same enum value (isNot)', function () {
        expect(TestUnitEnum::ONE->isNot('TWO'))->toBeTrue();
    });
});
