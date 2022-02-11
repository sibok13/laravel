<?php

declare(srtict_types=1);

namespace App\Contracts;
use Laravel\Socialite\Contracts\User;

interface Social
{
    public function setUser(User $socilaUser, string $network): string;
}