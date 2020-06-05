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
        'Début de lancement du produit',
        'Adidas - #ThereWillBeHaters',
        'Adidas - All In Or Nothing',
        'Topshop - #LiveTrends',
        'Mercedes - Build Your Own Gla',
        'Volvo - Interception',
        'Geico - Unskippable ads',
        'Stalker - LinkedIn',
        'Taken 3 - LinkedIn',
        'WWF - Last Selfie',
        'Taco Bell - Blackout',
        'Old Spice - Choose Your Own Adventure',
        'Foot Locker - Horse with Harden',
        'Madden - Giferator',
        'Smirnoff - Instagram your fridge',
        'Des campagnes au Québec',
        'Valentine - Snap',
        'Transat - Encan Soleil',
        'Kijiji Raps',
        'Domino\'s et les commandes par émoji',
        'Instaconcert - Telecom',
        'KLM - #HappyToHelp',
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
        'Baby Shark',
        '300 jours seul sur une iles',
        'Tuto GraphQL',
        'The Beatles - Hey Jude - Allie Sherlock Cover',
        'Coronacheck (petite chanson entêtante)',
        'LORIS - LA SAPOLOGIE',
        'LORIS - LE VOILE',
        'Puissance 4 Géant du haut d\'un château d\'eau (70m de hauteur)',
        'Il m\'a attendu 10 ans - 60 minutes avec Kheiron',
        'Allie Sherlock (Let Her Go)',
        'Haroun - Pas que',
        'L\'ALLEMAND - L\'HEURE DU CRIME - CLIP OFFICIEL',
        'Gardiens de la paix - ARTE Radio Podcast',
        'Un faux prophète - ARTE Radio',
        'Un appel de Vincent Lindon : « Comment ce pays si riche… »',
        'Hallelujah by Leonard Cohen * Allie Sherlock cover',
        'Comment ne pas être accro à son smartphone ? (et pourquoi l\'est-on ?)',
        '5 GROSSES ASTUCES POUR TOUT NEGOCIER (mais des trucs cool sans manipulation négative)',
        'TOUTES CES ERREURS QUI T\'EMPECHENT DE DEVENIR (UN BON) DEVELOPPEUR ...',
        'Ed Sheeran - Perfect (Official Music Video)',

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
        'jxWX1gANA5M',
        'jxWX1gANA5M',
        'jxWX1gANA5M',
        'jxWX1gANA5M',
        'jxWX1gANA5M',
        'jxWX1gANA5M',
        'jxWX1gANA5M',
        'jxWX1gANA5M',
        'jxWX1gANA5M',
        'jxWX1gANA5M',
        'jxWX1gANA5M',
        'jxWX1gANA5M',
        'jxWX1gANA5M',
        'jxWX1gANA5M',
        'jxWX1gANA5M',
        'jxWX1gANA5M',
        'jxWX1gANA5M',
        'jxWX1gANA5M',
        'jxWX1gANA5M',
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