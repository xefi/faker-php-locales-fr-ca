<?php

namespace Xefi\Faker\FrCa\Tests\Unit;

use Xefi\Faker\Calculators\Iban;

final class FinancialExtensionTest extends TestCase
{
    public function testIban(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $iban = $this->faker->iban();

            $this->assertMatchesRegularExpression('/^CA\d{22}$/', $iban);
            $this->assertTrue(Iban::isValid($iban));
        }
    }
}
