<?php

namespace Xefi\Faker\FrCa\Tests\Unit;

use Random\Randomizer;
use ReflectionClass;
use Xefi\Faker\Extensions\PersonExtension;

final class PersonExtensionTest extends TestCase
{
    protected array $firstNameMale = [];
    protected array $firstNameFemale = [];
    protected array $lastName = [];
    protected array $titleMale = [];
    protected array $titleFemale = [];

    protected function setUp(): void
    {
        parent::setUp();

        $personExtension = new \Xefi\Faker\FrCa\Extensions\PersonExtension(new Randomizer());
        $this->firstNameMale = (new ReflectionClass($personExtension))->getProperty('firstNameMale')->getValue($personExtension);
        $this->firstNameFemale = (new ReflectionClass($personExtension))->getProperty('firstNameFemale')->getValue($personExtension);
        $this->lastName = (new ReflectionClass($personExtension))->getProperty('lastName')->getValue($personExtension);
        $this->titleMale = (new ReflectionClass($personExtension))->getProperty('titleMale')->getValue($personExtension);
        $this->titleFemale = (new ReflectionClass($personExtension))->getProperty('titleFemale')->getValue($personExtension);
    }

    public function testFirstNameFemale(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->firstNameFemale); $i++) {
            $results[] = $this->faker->unique()->firstName(PersonExtension::GENDER_FEMALE);
        }

        $this->assertEqualsCanonicalizing(
            $this->firstNameFemale,
            $results
        );
    }

    public function testFirstNameMale(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->firstNameMale); $i++) {
            $results[] = $this->faker->unique()->firstName(PersonExtension::GENDER_MALE);
        }

        $this->assertEqualsCanonicalizing(
            $this->firstNameMale,
            $results
        );
    }

    public function testFirstName(): void
    {
        $results = [];
        $firstnames = array_unique(array_merge($this->firstNameMale, $this->firstNameFemale));
        for ($i = 0; $i < count($firstnames); $i++) {
            $results[] = $this->faker->unique()->firstName();
        }

        $this->assertEqualsCanonicalizing(
            $firstnames,
            $results
        );
    }

    public function testLastName(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->lastName); $i++) {
            $results[] = $this->faker->unique()->lastName();
        }

        $this->assertEqualsCanonicalizing(
            $this->lastName,
            $results
        );
    }

    public function testNameMale(): void
    {
        $results = [];
        for ($i = 0; $i < 100; $i++) {
            $results[] = $this->faker->name(PersonExtension::GENDER_MALE);
        }

        foreach ($results as $result) {
            $matchesFirstName = array_filter($this->firstNameMale, function ($firstName) use ($result) {
                return str_contains($result, $firstName);
            });
            $this->assertNotEmpty($matchesFirstName, "The first part of the result '{$result}' does not match any first name.");

            $matchesLastName = array_filter($this->lastName, function ($lastName) use ($result) {
                return str_contains($result, $lastName);
            });
            $this->assertNotEmpty($matchesLastName, "The second part of the result '{$result}' does not match any last name.");
        }
    }

    public function testNameFemale(): void
    {
        $results = [];
        for ($i = 0; $i < 100; $i++) {
            $results[] = $this->faker->name(PersonExtension::GENDER_FEMALE);
        }

        foreach ($results as $result) {
            $matchesFirstName = array_filter($this->firstNameFemale, function ($firstName) use ($result) {
                return str_contains($result, $firstName);
            });
            $this->assertNotEmpty($matchesFirstName, "The first part of the result '{$result}' does not match any first name.");

            $matchesLastName = array_filter($this->lastName, function ($lastName) use ($result) {
                return str_contains($result, $lastName);
            });
            $this->assertNotEmpty($matchesLastName, "The second part of the result '{$result}' does not match any last name.");
        }
    }

    public function testName(): void
    {
        $results = [];
        for ($i = 0; $i < 100; $i++) {
            $results[] = $this->faker->name();
        }

        foreach ($results as $result) {
            $matchesFirstName = array_filter(array_merge($this->firstNameFemale, $this->firstNameMale), function ($firstName) use ($result) {
                return str_contains($result, $firstName);
            });
            $this->assertNotEmpty($matchesFirstName, "The first part of the result '{$result}' does not match any first name.");

            $matchesLastName = array_filter($this->lastName, function ($lastName) use ($result) {
                return str_contains($result, $lastName);
            });
            $this->assertNotEmpty($matchesLastName, "The second part of the result '{$result}' does not match any last name.");
        }
    }

    public function testTitleFemale(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->titleFemale); $i++) {
            $results[] = $this->faker->unique()->title(PersonExtension::GENDER_FEMALE);
        }

        $this->assertEqualsCanonicalizing(
            $this->titleFemale,
            $results
        );
    }

    public function testTitleMale(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->titleMale); $i++) {
            $results[] = $this->faker->unique()->title(PersonExtension::GENDER_MALE);
        }

        $this->assertEqualsCanonicalizing(
            $this->titleMale,
            $results
        );
    }

    public function testTitle(): void
    {
        $titles = array_unique(array_merge($this->titleFemale, $this->titleMale));

        $results = [];
        for ($i = 0; $i < count($titles); $i++) {
            $results[] = $this->faker->unique()->title();
        }

        $this->assertEqualsCanonicalizing(
            $titles,
            $results
        );
    }

    public function testSin(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $sin = $this->faker->sin();

            $this->assertMatchesRegularExpression('/^[1-7]\d{8}$/', $sin);
            $this->assertTrue($this->isValidLuhn($sin), "The SIN '{$sin}' should pass the Luhn check.");
        }
    }

    public function testFormattedSin(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $sin = $this->faker->sin(true);

            $this->assertMatchesRegularExpression('/^[1-7]\d{2} \d{3} \d{3}$/', $sin);
            $this->assertTrue($this->isValidLuhn(str_replace(' ', '', $sin)));
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
