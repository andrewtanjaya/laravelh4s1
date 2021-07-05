<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'andrew';
        $user->address = 'Jalan Kucing';
        $user->email = 'andrew@gmail.com';
        $user->phone = '082364328463';
        $user->password = bcrypt('andrew');
        $user->role = 'member';
        $user->save();

        $user1 = new User();
        $user1->name = 'admin';
        $user1->address = 'Jalan Burung';
        $user1->email = 'admin@gmail.com';
        $user1->phone = '0816347438';
        $user1->password = bcrypt('admin');
        $user1->role = 'admin';
        $user1->save();

    }
}
