<?php

namespace App\Services;

class MarkovMelodyGenerator
{
    protected $transitionMatrix;

    public function __construct()
    {
        // You can expand this matrix with real probabilities or train it from data
        $this->transitionMatrix = [
            'C' => ['D' => 0.3, 'E' => 0.4, 'G' => 0.3],
            'D' => ['E' => 0.5, 'F' => 0.5],
            'E' => ['F' => 0.6, 'G' => 0.4],
            'F' => ['G' => 0.7, 'A' => 0.3],
            'G' => ['A' => 0.5, 'B' => 0.5],
            'A' => ['B' => 0.5, 'C' => 0.5],
            'B' => ['C' => 1.0],
        ];
    }

    public function generate(int $length = 16, string $startNote = 'C'): array
    {
        $melody = [$startNote];
        for ($i = 1; $i < $length; $i++) {
            $current = $melody[$i - 1];
            $melody[] = $this->nextNoteFrom($current);
        }
        return $melody;
    }

    protected function nextNoteFrom(string $note): string
    {
        $transitions = $this->transitionMatrix[$note] ?? ['C' => 1.0];
        $rand = mt_rand() / mt_getrandmax();
        $sum = 0;

        foreach ($transitions as $nextNote => $prob) {
            $sum += $prob;
            if ($rand <= $sum) {
                return $nextNote;
            }
        }

        return array_key_first($transitions); 
    }
}
