<?php

namespace Xefi\Faker\FrCa\Extensions;

use Xefi\Faker\Calculators\Luhn;
use Xefi\Faker\Extensions\Extension;

class CompanyExtension extends Extension
{
    public function getLocale(): ?string
    {
        return 'fr_CA';
    }

    private array $companies = [
        'Construction Tremblay inc.', 'Les Entreprises Gagnon ltée', 'Boulangerie Saint-Laurent inc.',
        'Érablière du Lac ltée', 'Groupe Laurentides inc.', 'Transport Côté et Fils inc.',
        'Pelletier Avocats S.E.N.C.R.L.', 'Rénovations Bouchard inc.', 'Fromagerie de la Montérégie inc.',
        'Excavation Morin et Frères ltée', 'Distribution Beauce inc.', 'Les Services Informatiques Lavoie inc.',
        'Quincaillerie Fortin ltée', 'Toitures Gagné inc.', 'Garage Ouellet et Fils inc.',
        'Gestion immobilière Bélanger inc.', 'Les Vergers Lévesque S.E.N.C.', 'Bergeron Comptables agréés S.E.N.C.R.L.',
        'Imprimerie Leblanc inc.', 'Les Aliments Girard ltée', 'Plomberie Simard inc.',
        'Microbrasserie du Fjord inc.', 'Charpenterie Caron ltée', 'Aménagement paysager Beaulieu inc.',
        'Cloutier Assurances inc.', 'Pharmacie Dubé et Poirier S.E.N.C.', 'Électricité Fournier inc.',
        'Studio Lapointe Design inc.', 'Les Pêcheries de la Côte-Nord ltée', 'Ébénisterie Nadeau inc.',
    ];

    /**
     * Return a random company name.
     *
     * @return string
     */
    public function company(): string
    {
        return $this->pickArrayRandomElement($this->companies);
    }

    /**
     * Return a 9-digit federal business number (NE) with a valid Luhn check digit.
     *
     * @return string
     */
    public function businessNumber(): string
    {
        $base = $this->randomizer->getInt(1, 9).$this->randomizer->getBytesFromString('0123456789', 7);

        return $base.Luhn::checksum((int) $base);
    }

    /**
     * Return a GST/HST registration number, such as "123456782 RT0001".
     *
     * @return string
     */
    public function vat(): string
    {
        return $this->businessNumber().' RT0001';
    }
}
