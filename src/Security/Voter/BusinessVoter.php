<?php

namespace App\Security\Voter;

use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class BusinessVoter extends Voter
{
    protected function supports($attribute, $subject)
    {
        return in_array($attribute, ['SHOW', 'EDIT'])
            && $subject instanceof User;
    }

    protected function voteOnAttribute($attribute, $business, TokenInterface $token)
    {
        $user = $token->getUser();
        if (!$user instanceof UserInterface) {
            return false;
        }

        switch ($attribute) {
            case 'SHOW':
                return $business === $user;
                break;
        }

        switch ($attribute) {
            case 'EDIT':
                return $business === $user;
                break;
        }

        return false;
    }
}
