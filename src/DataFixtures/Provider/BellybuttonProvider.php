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
    /**
     * Retourne un tag au hasard
     */
    public static function bellybuttonTag()
    {
        return self::randomElement(self::$tags);
    }
}