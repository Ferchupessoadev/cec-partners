<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class deleteUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para eliminar un usuario';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = \App\Models\User::all();

        foreach ($users as $user) {
            $this->info("{$user->id} - {$user->name} - {$user->email}");
        }

        $id = $this->ask('Ingrese el ID del usuario a eliminar');

        $user = \App\Models\User::find($id);
        $user->delete();
    }
}
