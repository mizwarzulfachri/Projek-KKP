<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin: pengguna dan akses
        Role::find(1)->permissions()->attach([1, 2]);

        // SKPA: cuman membuat task akses
        Role::find(2)->permissions()->attach(2);
    }
}
