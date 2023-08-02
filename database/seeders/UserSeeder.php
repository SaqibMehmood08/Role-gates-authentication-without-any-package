<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            ['name'=>'user','email'=>'user@gmail.com','password'=>bcrypt('00000000')],
            ['name'=>'Editor','email'=>'Editor@gmail.com','password'=>bcrypt('00000000')],
            ['name'=>'Author','email'=>'Author@gmail.com','password'=>bcrypt('00000000')],
        ]);
        
        // roles
        Role::insert([
            ['name'=>'Editor','slug'=>'editor'],
            ['name'=>'Author','slug'=>'author'],
        ]);
        Permission::insert([
            ['name'=>'Add Post','slug'=>'add-post'],
            ['name'=>'f Post','slug'=>'delete-post'],
        ]);
    }
}
