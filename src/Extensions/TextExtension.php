<?php

namespace Xefi\Faker\FrCa\Extensions;

use Xefi\Faker\Extensions\TextExtension as BaseTextExtension;

class TextExtension extends BaseTextExtension
{
    public function getLocale(): ?string
    {
        return 'fr_CA';
    }

    /**
     * Text in format => Paragraphs => Sentences => Words.
     *
     * @var array|array[]
     */
    protected array $paragraphs = [
        [
            ['La', 'qualité', 'du', 'service', 'à', 'la', 'clientèle', 'demeure', 'une', 'priorité', 'pour', 'nos', 'équipes.'],
            ['Chaque', 'projet', 'est', 'planifié', 'avec', 'soin', 'avant', 'la', 'première', 'rencontre.'],
            ['Les', 'employés', 'collaborent', 'pour', 'atteindre', 'des', 'objectifs', 'communs.'],
            ['Un', 'courriel', 'clair', 'vaut', 'souvent', 'mieux', 'qu\'une', 'longue', 'réunion.'],
        ],
        [
            ['La', 'gestion', 'des', 'ressources', 'est', 'essentielle', 'à', 'la', 'réussite', 'de', 'l\'entreprise.'],
            ['Les', 'façons', 'de', 'faire', 'évoluent', 'selon', 'les', 'besoins', 'et', 'les', 'technologies.'],
            ['La', 'souplesse', 'permet', 'aux', 'organisations', 'de', 'demeurer', 'concurrentielles.'],
            ['Les', 'processus', 'sont', 'revus', 'chaque', 'automne', 'afin', 'd\'améliorer', 'les', 'résultats.'],
        ],
        [
            ['La', 'satisfaction', 'des', 'clients', 'dépend', 'de', 'notre', 'capacité', 'à', 'répondre', 'rapidement.'],
            ['Des', 'indicateurs', 'servent', 'à', 'mesurer', 'le', 'rendement', 'et', 'à', 'orienter', 'les', 'décisions.'],
            ['Les', 'défis', 'du', 'quotidien', 'se', 'règlent', 'grâce', 'au', 'travail', 'd\'équipe.'],
            ['Une', 'évaluation', 'régulière', 'des', 'pratiques', 'permet', 'de', 'cibler', 'les', 'améliorations.'],
        ],
        [
            ['La', 'formation', 'continue', 'est', 'encouragée', 'dans', 'toutes', 'nos', 'succursales.'],
            ['Les', 'stagiaires', 'sont', 'accompagnés', 'par', 'des', 'collègues', 'expérimentés.'],
            ['Des', 'ateliers', 'sont', 'offerts', 'la', 'fin', 'de', 'semaine', 'pour', 'ceux', 'qui', 'le', 'souhaitent.'],
            ['Les', 'programmes', 'personnalisés', 'soutiennent', 'le', 'développement', 'de', 'chacun.'],
        ],
        [
            ['L\'analyse', 'des', 'données', 'aide', 'à', 'repérer', 'de', 'nouvelles', 'occasions', 'd\'affaires.'],
            ['Les', 'objectifs', 'sont', 'ajustés', 'selon', 'l\'évolution', 'du', 'marché', 'québécois.'],
            ['Un', 'suivi', 'rigoureux', 'permet', 'de', 's\'adapter', 'rapidement', 'aux', 'changements.'],
            ['Les', 'décisions', 'reposent', 'sur', 'des', 'données', 'fiables', 'et', 'des', 'analyses', 'précises.'],
            ['Un', 'bilan', 'annuel', 'est', 'présenté', 'aux', 'actionnaires', 'au', 'printemps.'],
        ],
    ];
}
