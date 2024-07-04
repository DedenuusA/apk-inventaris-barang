<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $uder = new User;
        $uder->name = 'admin';
        $uder->email = 'admin@gmail.com';
        $uder->password = bcrypt('admin123');
        $uder->jenis_kelamin = 'laki-laki';
        $uder->role = 'admin';

        $uder->save();
    }
}
