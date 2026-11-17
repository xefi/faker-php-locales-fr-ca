<?php

namespace Xefi\Faker\FrCa\Extensions;

use Xefi\Faker\Extensions\Extension;

class AddressExtension extends Extension
{
    public function getLocale(): ?string
    {
        return 'fr_CA';
    }

    protected $provinces = [
        'Alberta' => 'AB', 'Colombie-Britannique' => 'BC', 'Île-du-Prince-Édouard' => 'PE', 'Manitoba' => 'MB',
        'Nouveau-Brunswick' => 'NB', 'Nouvelle-Écosse' => 'NS', 'Ontario' => 'ON', 'Québec' => 'QC',
        'Saskatchewan' => 'SK', 'Terre-Neuve-et-Labrador' => 'NL', 'Nunavut' => 'NU',
        'Territoires du Nord-Ouest' => 'NT', 'Yukon' => 'YT',
    ];

    protected $regions = [
        'Bas-Saint-Laurent', 'Saguenay–Lac-Saint-Jean', 'Capitale-Nationale', 'Mauricie', 'Estrie', 'Montréal',
        'Outaouais', 'Abitibi-Témiscamingue', 'Côte-Nord', 'Nord-du-Québec', 'Gaspésie–Îles-de-la-Madeleine',
        'Chaudière-Appalaches', 'Laval', 'Lanaudière', 'Laurentides', 'Montérégie', 'Centre-du-Québec',
    ];

    protected $cities = [
        'Montréal', 'Québec', 'Laval', 'Gatineau', 'Longueuil', 'Sherbrooke', 'Lévis', 'Saguenay', 'Trois-Rivières',
        'Terrebonne', 'Saint-Jean-sur-Richelieu', 'Repentigny', 'Brossard', 'Drummondville', 'Saint-Jérôme',
        'Granby', 'Blainville', 'Saint-Hyacinthe', 'Mirabel', 'Shawinigan', 'Rimouski', 'Victoriaville',
        'Châteauguay', 'Mascouche', 'Rouyn-Noranda', 'Salaberry-de-Valleyfield', 'Sorel-Tracy', 'Alma',
        'Sept-Îles', 'Joliette',
    ];

    protected $streetTypes = ['rue', 'avenue', 'boulevard', 'chemin', 'rang', 'montée', 'place', 'côte', 'route', 'croissant'];

    protected $streetNames = [
        'Saint-Denis', 'Sainte-Catherine', 'Sherbrooke', 'Saint-Laurent', 'Papineau', 'De Maisonneuve', 'Jean-Talon',
        'Laurier', 'du Mont-Royal', 'René-Lévesque', 'Notre-Dame', 'Saint-Jean', 'Cartier', 'Champlain',
        'Wilfrid-Laurier', 'des Érables', 'du Lac', 'de l\'Église', 'Principale', 'Saint-Joseph', 'Taschereau',
        'Masson', 'Beaubien', 'Rachel', 'Frontenac', 'Hochelaga', 'Fleury', 'Henri-Bourassa', 'Pie-IX',
        'Lajeunesse', 'Christophe-Colomb', 'de la Montagne', 'des Pins', 'du Moulin', 'de la Rivière',
    ];

    /**
     * Return a random administrative region of Québec.
     *
     * @return string
     */
    public function region(): string
    {
        return $this->pickArrayRandomElement($this->regions);
    }

    /**
     * Return a random province or territory name.
     *
     * @return string
     */
    public function province(): string
    {
        return $this->pickArrayRandomKey($this->provinces);
    }

    /**
     * Return a random two-letter province or territory code.
     *
     * @return string
     */
    public function provinceCode(): string
    {
        return $this->pickArrayRandomElement($this->provinces);
    }

    /**
     * Return a random city of Québec.
     *
     * @return string
     */
    public function city(): string
    {
        return $this->pickArrayRandomElement($this->cities);
    }

    /**
     * Return a random Québec postal code, such as "H2X 1K4".
     *
     * @return string
     */
    public function postcode(): string
    {
        $letters = 'ABCEGHJKLMNPRSTVWXYZ';

        return sprintf(
            '%s%d%s %d%s%d',
            $this->pickArrayRandomElement(['G', 'H', 'J']),
            $this->randomizer->getInt(0, 9),
            $this->randomizer->getBytesFromString($letters, 1),
            $this->randomizer->getInt(0, 9),
            $this->randomizer->getBytesFromString($letters, 1),
            $this->randomizer->getInt(0, 9)
        );
    }

    /**
     * Return a random civic number.
     *
     * @return int
     */
    public function houseNumber(): int
    {
        return $this->randomizer->getInt(1, 9999);
    }

    /**
     * Return a random street name, such as "rue Saint-Denis".
     *
     * @return string
     */
    public function streetName(): string
    {
        return sprintf('%s %s', $this->pickArrayRandomElement($this->streetTypes), $this->pickArrayRandomElement($this->streetNames));
    }

    /**
     * Return a civic number followed by a street name, such as "1234, rue Saint-Denis".
     *
     * @return string
     */
    public function streetAddress(): string
    {
        return sprintf('%d, %s', $this->houseNumber(), $this->streetName());
    }

    /**
     * Return a full postal address, such as "1234, rue Saint-Denis, Montréal (Québec) H2X 1K4".
     *
     * @return string
     */
    public function fullAddress(): string
    {
        return sprintf('%s, %s (Québec) %s', $this->streetAddress(), $this->city(), $this->postcode());
    }
}
