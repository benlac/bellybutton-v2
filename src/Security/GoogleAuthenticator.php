<?php

namespace App\Security;

use App\Entity\User;
use App\Service\GoogleUserProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class GoogleAuthenticator extends AbstractGuardAuthenticator
{
    private $provider;

    public function __construct(GoogleUserProvider $provider)
    {
        $this->provider = $provider;
    }
    public function supports(Request $request)
    {
        return $request->query->get('code');
    }

    public function getCredentials(Request $request)
    {
        return [
            'code' => $request->query->get('code'),
        ];
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $userAuthentified = $this->provider->loadUserFromGoogle($credentials['code']);
        $userGoogle = new User();
        $userGoogle->setEmail($userAuthentified['email']);
        dump($userGoogle);
        return $userGoogle;
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        // check password
        return true;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        // todo
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        // todo
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
        return new JsonResponse('unauthorized');
    }

    public function supportsRememberMe()
    {
        // todo
    }
}
