<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Limpiar la caché de roles y permisos para evitar conflictos
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear los roles oficiales para DESPANIC S.A
        Role::firstOrCreate(['name' => 'Administrador General']);
        Role::firstOrCreate(['name' => 'Encargado Recepcion']);
        Role::firstOrCreate(['name' => 'Encargado Pilones']);
        Role::firstOrCreate(['name' => 'Encargado Despalillo']);
        Role::firstOrCreate(['name' => 'Encargado Secadero']);
        Role::firstOrCreate(['name' => 'Encargado Pacas']);
    }
}
