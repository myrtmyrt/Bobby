<?php

namespace App\Enum;

enum RequestStateEnum:string{
    case EnAttente = 'En attente';
    case Validee = 'Validée';
    case Refusee = 'Refusée';
}
