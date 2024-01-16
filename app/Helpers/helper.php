<?php

function arrayRecursiveDiff(array $array1, array $array2): array
{
    $result = [];

    foreach ($array1 as $key => $value) {
        // If the key does not exist in the second array or values are different
        if (! array_key_exists($key, $array2) || $value !== $array2[$key]) {
            $result[$key] = $value;
        } elseif (is_array($value)) {
            // If the value is an array, recurse
            $recursiveDiff = arrayRecursiveDiff($value, $array2[$key]);

            if (count($recursiveDiff)) {
                $result[$key] = $recursiveDiff;
            }
        }
    }

    return $result;
}
