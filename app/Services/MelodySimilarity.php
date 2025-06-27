<?php
namespace App\Services;

class MelodySimilarity
{
    public function similarityScore(string $melody1, string $melody2): float
    {
        // Remove spaces to treat melodies as strings for distance calc
        $str1 = str_replace(' ', '', $melody1);
        $str2 = str_replace(' ', '', $melody2);

        $maxLen = max(strlen($str1), strlen($str2));
        if ($maxLen == 0) return 1.0; // identical empty melodies

        $distance = levenshtein($str1, $str2);
        // Similarity from 0 to 1 (1 = identical)
        return 1 - ($distance / $maxLen);
    }
}
