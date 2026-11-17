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
}
