<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Services\Dashboard\SettingsService;

class SettingsController extends Controller
{
    protected $settingsService;

    public function __construct(SettingsService $settingsService)
    {
        $this->settingsService = $settingsService;
    }

    public function edit()
    {
        $admin = $this->settingsService->getProfile();

        return view('dashboard.settings.edit', compact('admin'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $this->settingsService->updateProfile($request->validated());

        return redirect()->route('dashboard.settings.edit')
            ->with('success', 'Profil mis à jour avec succès.');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $this->settingsService->updatePassword($request->validated()['new_password']);

        return redirect()->route('dashboard.settings.edit')
            ->with('success', 'Mot de passe modifié avec succès.');
    }
}
