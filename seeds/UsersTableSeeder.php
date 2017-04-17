<?php

use App\User;
use jotapepinheiro\LaravelRoles\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $adminRole = Role::whereSlug('admin')->first();
        $moderadorRole = Role::whereSlug('moderador')->first();

        $empresaRole = Role::whereSlug('empresa')->first();
        $motoristaRole = Role::whereSlug('motorista')->first();
        $usuarioRole = Role::whereSlug('usuario')->first();

        // Seed test admin
        $user = User::where('email', '=', 'admin@admin.com')->first();
        if ($user === null) {
            $user = User::create(array(
                'name'              => $faker->userName,
                'email'             => 'admin@admin.com',
                'password'          => Hash::make('password')
            ));

            $user->attachRole($adminRole);
            $user->save();
        }

        // Seed test moderador
        $user = User::where('email', '=', 'moderador@moderador.com')->first();
        if ($user === null) {
            $user = User::create(array(
                'name'              => $faker->userName,
                'email'             => 'moderador@moderador.com',
                'password'          => Hash::make('password')
            ));

            $user->attachRole($moderadorRole);
            $user->save();
        }

        // Seed test empresa
        $user = User::where('email', '=', 'empresa@empresa.com')->first();
        if ($user === null) {
            $user = User::create(array(
                'name'              => $faker->userName,
                'email'             => 'empresa@empresa.com',
                'password'          => Hash::make('password')
            ));

            $user->attachRole($empresaRole);
            $user->save();
        }

        // Seed test motorista
        $user = User::where('email', '=', 'motorista@motorista.com')->first();
        if ($user === null) {
            $user = User::create(array(
                'name'              => $faker->userName,
                'email'             => 'motorista@motorista.com',
                'password'          => Hash::make('password')
            ));

            $user->attachRole($motoristaRole);
            $user->save();
        }

        // Seed test usuario
        $user = User::where('email', '=', 'usuario@usuario.com')->first();
        if ($user === null) {
            $user = User::create(array(
                'name'              => $faker->userName,
                'email'             => 'usuario@usuario.com',
                'password'          => Hash::make('password')
            ));

            $user->attachRole($usuarioRole);
            $user->save();
        }

    }
}