<?php

namespace Database\Seeders;

use App\Models\Debits;
use App\Models\Partner;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Partner::factory(100)->create();

        $user = User::create([
            'name' => 'Fernando',
            'email' => 'fernandomatiaspessoa471@gmail.com',
            'password' => Hash::make('123ferchu'),
            'email_verified_at' => now(),
        ]);

        Settings::create([
            'key' => 'membership_fee',
            'value' => '15000.00',
        ]);

        $this->call(RoleSeeder::class);

        $user->assignRole('user');
        $user->assignRole('admin');

        Debits::create([
            'name' => 'activo',
            'amount' => '15000.00',
        ]);

        Debits::create([
            'name' => 'becado',
            'amount' => '0.00',
        ]);

        Debits::create([
            'name' => 'activo socio',
            'amount' => '12000.00',
        ]);

        Debits::create([
            'name' => 'socio cadete',
            'amount' => '2000.00',
        ]);
    }
}
