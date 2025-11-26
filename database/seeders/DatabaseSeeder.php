<?php

namespace Database\Seeders;

use App\Models\DebitInstance;
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

        $this->call(RoleSeeder::class);

        $user->assignRole('user');
        $user->assignRole('admin');

        $activo = Debits::create([
            'name' => 'activo',
            'amount' => '15000.00',
        ]);

        DebitInstance::create([
            'name' => $activo->name,
            'amount' => '15000.00',
            'due_date' => now()->format('Y-m'),
            'debits_id' => $activo->id
        ]);

        $socio_cadete = Debits::create([
            'name' => 'socio cadete',
            'amount' => '2000.00',
        ]);

        DebitInstance::create([
            'name' => $socio_cadete->name,
            'amount' => '2000.00',
            'due_date' => now()->format('Y-m'),
            'debits_id' => $socio_cadete->id
        ]);
    }
}
