<?php

namespace Xefi\Faker\FrCa;

use Xefi\Faker\FrCa\Extensions\AddressExtension;
use Xefi\Faker\FrCa\Extensions\ColorsExtension;
use Xefi\Faker\FrCa\Extensions\CompanyExtension;
use Xefi\Faker\FrCa\Extensions\FinancialExtension;
use Xefi\Faker\FrCa\Extensions\PersonExtension;
use Xefi\Faker\FrCa\Extensions\PhoneExtension;
use Xefi\Faker\FrCa\Extensions\TextExtension;
use Xefi\Faker\Providers\Provider;

class FakerFrCaServiceProvider extends Provider
{
    public function boot(): void
    {
        $this->extensions([
            AddressExtension::class,
            ColorsExtension::class,
            CompanyExtension::class,
            FinancialExtension::class,
            PersonExtension::class,
            PhoneExtension::class,
            TextExtension::class,
        ]);
    }
}
