<?php

namespace Xefi\Faker\FrCa\Extensions;

use Xefi\Faker\Extensions\PhoneExtension as BasePhoneExtension;

class PhoneExtension extends BasePhoneExtension
{
    public string $indicator = '+1';

    public function getLocale(): ?string
    {
        return 'fr_CA';
    }

    protected array $landlineFormats = [
        '514{separator}{exchange}{d}{d}{separator}{d}{d}{d}{d}',
        '418{separator}{exchange}{d}{d}{separator}{d}{d}{d}{d}',
        '450{separator}{exchange}{d}{d}{separator}{d}{d}{d}{d}',
        '819{separator}{exchange}{d}{d}{separator}{d}{d}{d}{d}',
    ];

    protected array $cellFormats = [
        '438{separator}{exchange}{d}{d}{separator}{d}{d}{d}{d}',
        '581{separator}{exchange}{d}{d}{separator}{d}{d}{d}{d}',
        '579{separator}{exchange}{d}{d}{separator}{d}{d}{d}{d}',
        '873{separator}{exchange}{d}{d}{separator}{d}{d}{d}{d}',
        '367{separator}{exchange}{d}{d}{separator}{d}{d}{d}{d}',
    ];

    /**
     * Generate a North American phone number, with an exchange starting with 2-9 and a separator
     * between the indicator and the number.
     *
     * @param string|null $format
     * @param string      $separator
     * @param string|null $prefix
     *
     * @return string
     */
    public function phoneNumber(?string $format = null, string $separator = '', ?string $prefix = null): string
    {
        if ($format === null) {
            $format = $this->pickArrayRandomElement($this->randomizer->getInt(0, 1) ? $this->landlineFormats : $this->cellFormats);
        }

        if ($prefix === $this->indicator) {
            $prefix .= $separator;
        }

        $format = str_replace('{exchange}', (string) $this->randomizer->getInt(2, 9), $format);

        return parent::phoneNumber($format, $separator, $prefix);
    }
}
