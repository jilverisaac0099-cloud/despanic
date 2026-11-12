<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $roles = [
            'Administrador General',
            'Encargado Recepcion',
            'Encargado Pilones',
            'Encargado Despalillo',
            'Encargado Secadero',
            'Encargado Pacas',
        ];

        foreach ($roles as $nombreRol) {
            Role::firstOrCreate(['name' => $nombreRol]);
        }

        $usuarios = [
            ['name' => 'Admin General', 'email' => 'admin@despanic.com', 'role' => 'Administrador General'],
            ['name' => 'Encargado de Recepción', 'email' => 'recepcion@despanic.com', 'role' => 'Encargado Recepcion'],
            ['name' => 'Encargado de Pilones', 'email' => 'pilones@despanic.com', 'role' => 'Encargado Pilones'],
            ['name' => 'Encargado de Despalillo', 'email' => 'despalillo@despanic.com', 'role' => 'Encargado Despalillo'],
            ['name' => 'Encargado de Secadero', 'email' => 'secadero@despanic.com', 'role' => 'Encargado Secadero'],
            ['name' => 'Encargado de Pacas', 'email' => 'pacas@despanic.com', 'role' => 'Encargado Pacas'],
        ];

        foreach ($usuarios as $datos) {
            $usuario = User::updateOrCreate(
                ['email' => $datos['email']],
                [
                    'name'              => $datos['name'],
                    'password'          => 'password123',
                    'email_verified_at' => now(),
                ]
            );

            $usuario->syncRoles([$datos['role']]);
        }
    }
}