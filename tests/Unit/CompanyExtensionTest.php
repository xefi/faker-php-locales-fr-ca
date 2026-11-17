<?php

namespace Xefi\Faker\FrCa\Tests\Unit;

use Random\Randomizer;
use Xefi\Faker\FrCa\Extensions\CompanyExtension;

final class CompanyExtensionTest extends TestCase
{
    protected array $companies = [];

    protected function setUp(): void
    {
        parent::setUp();

        $companyExtension = new CompanyExtension(new Randomizer());
        $this->companies = (new \ReflectionClass($companyExtension))->getProperty('companies')->getValue($companyExtension);
    }

    public function testCompany(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->companies); $i++) {
            $results[] = $this->faker->unique()->company();
        }

        $this->assertEqualsCanonicalizing($this->companies, $results);
    }

    public function testBusinessNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $businessNumber = $this->faker->businessNumber();

            $this->assertMatchesRegularExpression('/^[1-9]\d{8}$/', $businessNumber);
            $this->assertTrue($this->isValidLuhn($businessNumber), "The business number '{$businessNumber}' should pass the Luhn check.");
        }
    }

    public function testVat(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $vat = $this->faker->vat();

            $this->assertMatchesRegularExpression('/^\d{9} RT0001$/', $vat);
            $this->assertTrue($this->isValidLuhn(substr($vat, 0, 9)));
        }
    }

    private function isValidLuhn(string $number): bool
    {
        $sum = 0;
        $digits = strrev($number);
        for ($i = 0; $i < strlen($digits); $i++) {
            $digit = (int) $digits[$i];

            if ($i % 2 === 1) {
                $digit *= 2;
                $digit = $digit > 9 ? $digit - 9 : $digit;
            }

            $sum += $digit;
        }

        return $sum % 10 === 0;
    }
}
