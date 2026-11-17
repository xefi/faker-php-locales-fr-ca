<?php

namespace Xefi\Faker\FrCa\Extensions;

use Xefi\Faker\Extensions\FinancialExtension as BaseFinancialExtension;

class FinancialExtension extends BaseFinancialExtension
{
    public function getLocale(): ?string
    {
        return 'fr_CA';
    }

    /**
     * Return an IBAN-shaped number built from a Canadian account: 3-digit institution, 5-digit transit and 12-digit account.
     *
     * @param ?string $countryCode
     * @param ?string $format      [{d} => digit, {l} => letter, {a} => any]
     *
     * @return string
     */
    public function iban(?string $countryCode = null, ?string $format = null): string
    {
        if ($countryCode === null) {
            $countryCode = 'CA';
        }

        if ($format === null) {
            $format = str_repeat('{d}', 3).str_repeat('{d}', 5).str_repeat('{d}', 12);
        }

        return parent::iban($countryCode, $format);
    }
}
