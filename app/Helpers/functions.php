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
            return $date;
        } 
        return false;
    } 
}

if (!function_exists('limitText')) {
    function limitText(string $text, int $limitNumber) {
        return mb_strimwidth($text, 0, $limitNumber, "...");
    }
}
if (!function_exists('statusColor')) {
    function statusColor(string $status): string
    {
        switch ($status) { 
            case "A":
                return 'bg-blue-300';
                break;
            case "P":
                return 'bg-orange-300';
                break;
            case "C":
                return 'bg-green-300';
                break;
            default:
                return 'd-none';
        }
    }
}
