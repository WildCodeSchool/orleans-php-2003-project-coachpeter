<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class PhoneFormatExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('formatPhoneFr', [$this, 'formatPhoneFr']),
        ];
    }

    public function formatPhoneFr($value)
    {
        $caracters = array("/", "-", "_", " ", ".", ",");
        $value = str_replace($caracters, '', $value);
        $array = str_split($value, 2);
        $newNum = implode(' ', $array);
        return $newNum;
    }
}
