<?php

namespace App\Utils;

use Exception;

class TokenGenerator
{
    public function tokenGenerator(): ?string
    {
        try {
            return bin2hex(random_bytes(20).random_int(1, 999));
        } catch (Exception $e) {
            // return $e->getMessage();
            return null;
        }
    }

    public function randomTrueOrFalse(): ?bool
    {
        try {
            return (bool)random_int(0, 1);
        } catch (Exception $e) {
            return null;
        }
    }

    public function tokenGenerator2(string $secret = null)
    {
        // $date = new \DateTime();
        // $date = $date->format('d-m-Y');
        $dateImmu = new \DateTimeImmutable();
        $dateImmu = $dateImmu->format('d-m-Y');
        $bytes = random_bytes(15);
        // comparing two hash => if(hash_equals($theTokenGenerated, $userInput)) { ... }
        return bin2hex($bytes.$dateImmu.$secret);
    }
}
