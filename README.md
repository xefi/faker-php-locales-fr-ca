# Faker PHP — fr_CA locale

Canadian French (`fr_CA`) locale for [Faker PHP](https://github.com/xefi/faker-php).

## Installation

```bash
composer require --dev xefi/faker-php-locales-fr-ca
```

The service provider is discovered automatically through Composer.

## Usage

```php
use Xefi\Faker\Faker;

$faker = new Faker('fr_CA');
```

Generators without a `fr_CA` variant fall back to the default locale.

## Locale-specific generators

| Method | Extension | Example |
| --- | --- | --- |
| `province()` / `provinceCode()` | Address | `Québec` / `QC` |
| `postcode()` | Address | `H2X 1K4` |
| `sin(bool $formatted = false)` | Person | `130 546 278` (Luhn check digit) |
| `businessNumber()` | Company | `123456782` (Luhn check digit) |
| `vat()` | Company | `123456782 RT0001` (GST/HST number) |

Canada does not use IBAN: `iban()` keeps the shape of the other locales with a Canadian account
(institution, transit and account numbers) behind a `CA` prefix.

## Contributing

1. Fork the repository and create a branch from `main`.
2. Add an extension under `src/Extensions/` and register it in `FakerFrCaServiceProvider::boot()`.
3. Add a test under `tests/Unit/`.
4. Run the suite with `vendor/bin/phpunit` (or `docker compose run php vendor/bin/phpunit`).
5. Open a pull request against `main`.

## License

MIT
