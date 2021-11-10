<?php

namespace Database\Seeders;

use App\Models\role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        role::create([
            'role_nm' => 'admin',
        ]);

        role::create([
            'role_nm' => 'teacher',

        ]);
        role::create([
            'role_nm' => 'student',
        ]);
    }
}
