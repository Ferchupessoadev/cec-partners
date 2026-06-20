<?php

namespace Database\Seeders;

use App\Models\Debit;
use App\Models\Invoice;
use App\Models\Partner;
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
        // 1. Crear el usuario administrador
        $user = User::create([
            'name' => 'Fernando',
            'email' => 'fernandomatiaspessoa471@gmail.com',
            'password' => Hash::make('123ferchu'),
            'email_verified_at' => now(),
        ]);

        $this->call(RoleSeeder::class);
        $user->assignRole('admin');

        $activo = Debit::create(['name' => 'activo', 'amount' => '15000.00', 'frequency' => 'monthly']);
        $socio_cadete = Debit::create(['name' => 'socio cadete', 'amount' => '2000.00', 'frequency' => 'monthly']);

        Partner::factory(5)->create()->each(function ($partner) use ($activo, $socio_cadete) {

            $partner->debits()->attach([$activo->id, $socio_cadete->id]);

            foreach ([$activo, $socio_cadete] as $debit) {
                Invoice::create([
                    'partner_id' => $partner->id,
                    'debit_id'  => $debit->id,
                    'amount'     => $debit->amount,
                    'period'     => now()->format('Y-m'),
                    'status'     => 'pendiente',
                    'due_date'   => now()->addMonth(),
                ]);
            }
        });
    }
}
