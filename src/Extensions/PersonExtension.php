<?php

namespace Xefi\Faker\FrCa\Extensions;

use Xefi\Faker\Calculators\Luhn;
use Xefi\Faker\Extensions\PersonExtension as BasePersonExtension;

class PersonExtension extends BasePersonExtension
{
    public function getLocale(): ?string
    {
        return 'fr_CA';
    }

    protected $firstNameMale = [
        'Jean', 'Pierre', 'Michel', 'André', 'Luc', 'Marc', 'François', 'Daniel', 'Alain', 'Stéphane',
        'Sylvain', 'Martin', 'Patrick', 'Éric', 'Mathieu', 'Simon', 'Gabriel', 'Samuel', 'Félix', 'William',
        'Olivier', 'Alexandre', 'Antoine', 'Louis', 'Thomas', 'Nicolas', 'Jérôme', 'Benoît', 'Guillaume', 'Maxime',
        'Philippe', 'Charles', 'Étienne', 'Jacques', 'Gilles', 'Réjean', 'Gaétan', 'Yves', 'Raymond', 'Normand',
    ];

    protected $firstNameFemale = [
        'Marie', 'Julie', 'Isabelle', 'Nathalie', 'Sylvie', 'Chantal', 'Josée', 'Manon', 'Lucie', 'Line',
        'Diane', 'Johanne', 'Geneviève', 'Mélanie', 'Catherine', 'Valérie', 'Annie', 'Karine', 'Émilie', 'Audrey',
        'Camille', 'Léa', 'Florence', 'Rosalie', 'Juliette', 'Charlotte', 'Alice', 'Béatrice', 'Laurence', 'Gabrielle',
        'Maude', 'Marie-Ève', 'Marie-Claude', 'Anne-Marie', 'France', 'Ginette', 'Lise', 'Francine', 'Jocelyne', 'Mireille',
    ];

    protected $lastName = [
        'Tremblay', 'Gagnon', 'Roy', 'Côté', 'Bouchard', 'Gauthier', 'Morin', 'Lavoie', 'Fortin', 'Gagné',
        'Ouellet', 'Pelletier', 'Bélanger', 'Lévesque', 'Bergeron', 'Leblanc', 'Paquette', 'Girard', 'Simard', 'Boucher',
        'Caron', 'Beaulieu', 'Cloutier', 'Dubé', 'Poirier', 'Fournier', 'Lapointe', 'Leclerc', 'Lefebvre', 'Poulin',
        'Thibault', 'St-Pierre', 'Nadeau', 'Landry', 'Martel', 'Bédard', 'Grenier', 'Lessard', 'Bernier', 'Gingras',
    ];

    protected $titleMale = ['M.', 'Dr', 'Me', 'Pr'];

    protected $titleFemale = ['Mme', 'Dre', 'Me', 'Pre'];

    /**
     * Return a social insurance number (NAS) with a valid Luhn check digit.
     *
     * @param bool $formatted Format the number as NNN NNN NNN
     *
     * @return string
     */
    public function sin(bool $formatted = false): string
    {
        $base = $this->randomizer->getInt(1, 7).$this->randomizer->getBytesFromString('0123456789', 7);
        $sin = $base.Luhn::checksum((int) $base);

        if ($formatted) {
            return implode(' ', str_split($sin, 3));
        }

        return $sin;
    }
}
