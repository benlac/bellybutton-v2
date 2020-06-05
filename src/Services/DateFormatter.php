<?php

namespace App\Service;

class DateFormatter
{
    /**
     * Format DateTime object to a string format
     * 
     * @param object $entity
     * @param array $properties Array of property to format (has to be DateTime Objet)
     * @param string $format Date format of your choice
     * 
     * @return bool
     */
    static public function format($entity, $properties, $format = 'd.m.Y')
    {
        foreach ($properties as $property) {
            $getMethodName = 'get'.ucfirst($property);
            $setMethodName = 'set'.ucfirst($property);

            // Si la date est un datetime et n'est pas null
            if ($entity->$getMethodName() instanceof \DateTime && $entity->$getMethodName() !== null) {
                // On modifie la timezone de la date
                $date = $entity->$getMethodName()->setTimezone(new \DateTimeZone('Europe/Paris'));
                // On modifie son format
                $entity->$setMethodName($date->format($format));
            }
        }

        return true;
    }
}