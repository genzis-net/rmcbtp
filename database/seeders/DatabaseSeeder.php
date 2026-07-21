<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use RuntimeException;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');
        $name = env('ADMIN_NAME', 'Admin');

        if (!is_string($email) || $email === '') {
            throw new RuntimeException('ADMIN_EMAIL must be set before seeding.');
        }

        if (!is_string($password) || strlen($password) < 12) {
            throw new RuntimeException('ADMIN_PASSWORD must be set and at least 12 characters.');
        }

        $user = User::query()->firstOrNew(['email' => $email]);
        $user->forceFill([
            'name' => $name,
            'password' => Hash::make($password),
            'email_verified_at' => $user->email_verified_at ?? now(),
            'is_admin' => true,
        ])->save();
    }
}
