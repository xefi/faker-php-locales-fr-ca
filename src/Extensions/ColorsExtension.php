<?php

namespace Xefi\Faker\FrCa\Extensions;

use Xefi\Faker\Extensions\ColorsExtension as BaseColorsExtension;

class ColorsExtension extends BaseColorsExtension
{
    public function getLocale(): ?string
    {
        return 'fr_CA';
    }

    protected array $safeColorNames = [
        'Noir', 'Marron', 'Vert', 'BleuMarine', 'Olive',
        'Pourpre', 'Sarcelle', 'Lime', 'Bleu', 'Argent',
        'Gris', 'Jaune', 'Fuchsia', 'Aqua', 'Blanc',
    ];

    protected array $colorNames = [
        'Noir', 'Marron', 'Vert', 'BleuMarine', 'Olive',
        'Pourpre', 'Sarcelle', 'Lime', 'Bleu', 'Argent',
        'Gris', 'Jaune', 'Fuchsia', 'Aqua', 'Blanc',
        'Beige', 'Chocolat', 'Corail', 'Cyan', 'Cramoisi',
        'BleuFoncé', 'OrangeFoncé', 'RougeBrique', 'VertMer', 'BlancFloral',
        'VertForêt', 'Or', 'Rose', 'Indigo', 'Kaki',
        'Lavande', 'BleuClair', 'CorailClair', 'VertClair', 'SaumonClair',
        'Lin', 'Magenta', 'BleuMoyen', 'OrchidéeMoyenne', 'Mocassin',
        'Orange', 'Rouge', 'Prune', 'Pérou', 'BleuRoyal',
        'Saumon', 'BrunSable', 'BleuCiel', 'Neige', 'Turquoise',
        'Violet', 'BlancFumée',
    ];
}
