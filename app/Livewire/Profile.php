<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class Profile extends Component
{
    public $name;
    public $current_password;
    public $password;
    public $password_confirmation;

    public function mount()
    {
        $this->name = auth()->user()->name;
    }

    public function updateProfile()
    {
        $user = auth()->user();

        // 1. Validaciones
        $rules = [
            'name' => 'required|string|max:255',
            // Solo requerimos la contraseña actual si el usuario escribió algo en 'password'
            'current_password' => $this->password ? ['required', 'current_password'] : 'nullable',
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ];

        $this->validate($rules);

        // 2. Actualizar nombre si cambió
        if ($this->name !== $user->name) {
            $user->name = $this->name;
        }

        // 3. Actualizar contraseña solo si se ingresó una nueva
        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        // 4. Guardar solo si hubo cambios reales
        if ($user->isDirty()) {
            $user->save();
            session()->flash('message', 'Perfil actualizado correctamente.');
        } else {
            session()->flash('message', 'No se realizaron cambios.');
        }

        // Limpiar campos de contraseña
        $this->reset(['current_password', 'password', 'password_confirmation']);
    }

    #[Layout('components.layouts.app', ['title' => 'Perfil'])]
    public function render()
    {
        return view('livewire.profile');
    }
}
