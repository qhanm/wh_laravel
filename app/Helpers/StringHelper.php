<?php
namespace App\Helpers;

class StringHelper
{
    static function parseAttributeToString(string $attribute) : string
    {
        $attribute = str_replace('_', ' ', $attribute);
        return ucwords($attribute);
    }
}
