<?php
namespace App\Models;

use Symfony\Component\Security\Core\User\UserInterface;

class ApiUser implements UserInterface
{
    private array $info;

    const MESSAGE_READER_PERMISSION = 'read:admin-messages';

    const ROLE_MESSAGE_READER = 'ROLE_MESSAGE_READER';

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
        $roles = ['ROLE_USER'];

        if (!empty($this->info['permissions']) && in_array(self::MESSAGE_READER_PERMISSION, $this->info['permissions'])) {
            $roles[] = self::ROLE_MESSAGE_READER;
        }

        return $roles;
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
