<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Seed a testing admin user.
     *
     * @return void
     */
    public function run()
    {
        $email = env('TEST_ADMIN_EMAIL', 'testing-admin@civitas.ch');
        $password = env('TEST_ADMIN_PASSWORD', 'testing1234');

        $admin = User::firstOrNew(['email' => $email]);

        $admin->user_identifier = 'UR-' . uniqid('', true);
        $admin->role = '1';
        $admin->name = env('TEST_ADMIN_NAME', 'Testing Admin');
        $admin->firstname = 'Testing';
        $admin->lastname = 'Admin';
        $admin->gender = 'mr';
        $admin->mobile = null;
        $admin->country = 'CH';
        $admin->email = $email;
        $admin->password = Hash::make($password);
        $admin->is_active = '1';
        $admin->save();

        $this->command->info('Testing admin created: ' . $email . ' / ' . $password);
    }
}
