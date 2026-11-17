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
        '514{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '418{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '450{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '819{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
    ];

    protected array $cellFormats = [
        '438{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '581{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '579{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '873{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '367{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
    ];
}
