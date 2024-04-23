<?php

namespace App\Enums;

enum SupportStatus: string
{
    case A = "Aberto";
    case C = "Fechado";
    case P = "Pendente";

    public static function fromValue(string $name) 
    {
        foreach(self::cases() as $status) {
            if($name === $status->name) {
                return $status->value;
            }
        }
        throw new \ValueError("$status is not a valid");
    }
}