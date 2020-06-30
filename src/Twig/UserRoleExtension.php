<?php

namespace App\Twig;

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

    public function userRole($value)
    {
        $role = "";
        if ($value == "[\"ROLE_ADMIN\",\"ROLE_USER\"]") {
            $role .= "Administrateur ";
        } elseif ($value == "[\"ROLE_MEMBER\",\"ROLE_USER\"]") {
            $role .= "Membre ";
        } elseif ($value == "[\"ROLE_USER\"]") {
            $role .= "Client ";
        }
        return $role;
    }
}
