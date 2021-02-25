<?php
namespace App\Helpers;

class StringHelper
{
    static function parseAttributeToString(string $attribute) : string
    {
        $attribute = str_replace('_', ' ', $attribute);
        return ucwords($attribute);
    }

    static function uppercasePrefix(string $text)
    {
        return strtoupper(substr($text, 0, 3));
    }

    static function createStringNumber(string $number, int $length = 7) : string
    {
        $lengthNumber = strlen($number);

        return str_pad(str_repeat('0', $length - $lengthNumber), $length, $number, STR_PAD_RIGHT);
    }
}
