<?php
namespace App\Models;

use Symfony\Component\Security\Core\User\UserInterface;

class ApiUser implements UserInterface
{
    private array $info;

    public function __construct($info)
    {
        $this->info = $info;
    }

    public function getUserIdentifier()
    {
        return $this->info['sub'] ?? null;
    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function getPassword()
    {
        return null;
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
    }

    public function getUsername()
    {
        return $this->info['sub'] ?? null;
    }
}
