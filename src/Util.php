<?php

namespace App;

use Exception;

class Util
{
    public function tokenGenerator(): ?string
    {
        try {
            return bin2hex(random_bytes(20).random_int(1, 999));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}