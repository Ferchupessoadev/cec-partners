<?php

namespace App\Console\Commands;

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

        $user = new \App\Models\User();
        $user->name = $name;
        $user->email = $email;
        $user->email_verified_at = now();
        $user->password = Hash::make($password);
        $user->save();
    }
}
