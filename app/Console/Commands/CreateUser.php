<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user {name} {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for create user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->secret('Contraseña para el nuevo usuario: ');
        $password_confirmation = $this->secret('Confirmar contraseña: ');

        if ($password !== $password_confirmation) {
            $this->error('Las contraseñas no coinciden');
            return;
        }

        $role = $this->choice('Rol del usuario', ['admin', 'user'], 0);

        if (!in_array($role, ['admin', 'user'])) {
            $this->error('Rol inválido');
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('Email inválido');
            return;
        }

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->email_verified_at = now();
        $user->password = Hash::make($password);
        $user->assignRole($role);
        $user->save();
    }
}
