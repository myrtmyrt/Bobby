<?php

namespace App\Enum;

enum ConditionEnum:string
{
    case Neuf = 'Neuf';
    case TB = 'Tres Bon';
    case Bon = 'Bon';
    case Moyen = 'Moyen';
    case Mauvais = 'Mauvais';
    case TM = 'Tres Mauvais';
}
