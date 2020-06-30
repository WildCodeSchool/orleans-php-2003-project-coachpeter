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
        $char = ["[", "]", "\""];
        $value = str_replace($char, "", $value);
        $words = explode(",", $value);
        $role = "";
        foreach ($words as $word) {
            if ($word == "ROLE_ADMIN") {
                $role .= "Administrateur ";
            } elseif ($word == "ROLE_MEMBER") {
                $role .= "Membre ";
            } elseif ($word == "ROLE_USER") {
                $role .= "Client ";
            }
        }
        return $role;
    }
}
