<?php

namespace App\Services\Dashboard;

use Illuminate\Support\Facades\Auth;

class DashboardService
{
    public function getAuthenticatedAdmin()
    {
        return Auth::user();
    }
}
