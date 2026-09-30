<?php

namespace App\Services\Dashboard;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsService
{
    public function getProfile()
    {
        return Auth::user();
    }

    public function updateProfile(array $data)
    {
        $user = Auth::user();
        $user->update($data);

        return $user;
    }

    public function updatePassword(string $newPassword)
    {
        $user = Auth::user();
        $user->password = Hash::make($newPassword);
        $user->save();

        return $user;
    }
}
