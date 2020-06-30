<?php

namespace App\Twig;

use App\Entity\User;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class UserRoleExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('userRole', [$this, 'userRole']),
        ];
    }

    public function userRole($roles)
    {
        $userRole = "Client";
        if (in_array("ROLE_ADMIN", $roles)) {
            $userRole = "Administrateur";
        } elseif (in_array("ROLE_MEMBER", $roles)) {
            $userRole = "Membre";
        }

        return $userRole;
    }
}
