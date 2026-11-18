<?php

namespace Xefi\Faker\FrCa\Tests\Unit;

final class PhoneExtensionTest extends TestCase
{
    public function testPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^(514|418|450|819|438|581|579|873|367)\d{7}$/', $this->faker->phoneNumber());
        }
    }

    public function testLandlinePhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^(514|418|450|819)-\d{3}-\d{4}$/', $this->faker->dashedLandlinePhoneNumber());
        }
    }

    public function testCellPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^(438|581|579|873|367) \d{3} \d{4}$/', $this->faker->spacedCellPhoneNumber());
        }
    }

    public function testIndicatoredPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^\+1(514|418|450|819|438|581|579|873|367)\d{7}$/', $this->faker->indicatoredPhoneNumber());
        }
    }

    public function testIndicatorIsSeparatedFromTheNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertStringStartsWith('+1 ', $this->faker->spacedIndicatoredPhoneNumber());
            $this->assertStringStartsWith('+1-', $this->faker->dashedIndicatoredPhoneNumber());
            $this->assertStringStartsWith('+1.', $this->faker->dottedIndicatoredPhoneNumber());
            $this->assertMatchesRegularExpression('/^\+1\d+$/', $this->faker->indicatoredPhoneNumber());
        }
    }

    public function testExchangeStartsWithTwoToNine(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^\d{3}[2-9]\d{6}$/', $this->faker->phoneNumber());
            $this->assertMatchesRegularExpression('/^\+1 \d{3} [2-9]\d{2} \d{4}$/', $this->faker->spacedIndicatoredCellPhoneNumber());
        }
    }
}
