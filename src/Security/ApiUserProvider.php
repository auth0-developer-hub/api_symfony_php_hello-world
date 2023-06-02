<?php
namespace App\Security;

use App\Models\ApiUser;
use App\Services\JWTServiceInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class ApiUserProvider implements UserProviderInterface
{
    private JWTServiceInterface $jwtService;

    public function __construct(JWTServiceInterface $jwtService)
    {
        $this->jwtService = $jwtService;
    }

    public function loadUserByIdentifier($token)
    {
        $info = $this->jwtService->decodeBearerToken($token);

        return new ApiUser($info);
    }

    public function refreshUser(UserInterface $user)
    {
    }

    public function supportsClass(string $class)
    {
        return ApiUser::class === $class || is_subclass_of($class, ApiUser::class);
    }

    public function loadUserByUsername(string $username)
    {
    }
}
