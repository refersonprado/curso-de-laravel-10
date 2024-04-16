<?php

use App\Enums\SupportStatus;

if (!function_exists('getStatusSupport')) {
    function getStatusSupport(string $status): string
    {
        return SupportStatus::fromValue($status);
    }
}

if (!function_exists('formatDate')) {
    function formatDate(string | null $created_at): string 
    {
        if($created_at != null) {
            $date = date('d-m-Y', strtotime($created_at));
            return "Criado em $date";
        } 
        return false;
    } 
}