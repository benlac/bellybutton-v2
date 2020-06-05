<?php

namespace App\DataFixtures\Provider;

class BellybuttonProvider extends \Faker\Provider\Base
{
    protected static $tags = [
        'TOP 10',
        'CONSEILS',
        'STRORYTIME',
        'MEDIA SOCIAUX',
        'WEB MARKETING',
        'MARKETING STRATEGIQUE',
        'COMMUNICATION MARKETING',
        'MARQUES',
        'TALENT',
        'INFLUENCEUR'
    ];
    protected static $campaigns = [
        'Campagne 18-35 ans',
        'Lancement du nouveau produit',
        'Lacement de la collection d\'été',
        'Ciblage étendu Canada Belgique',
        'Fin d\'année lancement du produit',
        'Campagne de fin d\'année',
        'Ciblage étendu France USA',
        'Campagne Senior',
        'Campagne télé-réalité',
        'Début de lancement du produit'
    ];
    protected static $supports = [
        'J\'ai trouvé moins intuitif qu\'impots.gouv.fr !',
        '6 Défauts Vraiment Pénibles de la Vie de Freelance',
        'voilà pourquoi j\'ai peur de l\'avion',
        'mon premier et dernier entretien d’embauche',
        'ma nouvelle vie commence maintenant',
        'Leurs occupations sont mieux que les nôtres',
        'Faites pas les ouf vous allez pleurer aussi',
        'Faites pas les ouf vous allez pleurer aussi',
        'TU RIGOLES LA TERRE EXPLOSE !',
        'Vous voyez quoi vous ?',
    ];
    protected static $videos = [
        '9EMIMg4q2Ig',
        'wBJ3PMfvktY',
        'EOD9nVrrNr8',
        'siOR3p5D9gA',
        'w2w1j2CL6PU',
        'KKZyB3bc52Q',
        'VyT8KG0WC28',
        '71zQnz1syPQ',
        'kvYSwgmcVE0',
        'jxWX1gANA5M',
    ];
    /**
     * Retourne un tag au hasard
     */
    public static function bellybuttonTag()
    {
        return self::randomElement(self::$tags);
    }
    /**
     * Retourne une campagne au hasard
     */
    public static function bellybuttonCampaign()
    {
        return self::randomElement(self::$campaigns);
    }
    /**
     * Retourne un support au hasard
     */
    public static function bellybuttonSupport()
    {
        return self::randomElement(self::$supports);
    }
    /**
     * Retourne une video au hasard
     */
    public static function bellybuttonVideo()
    {
        return self::randomElement(self::$videos);
    }
}