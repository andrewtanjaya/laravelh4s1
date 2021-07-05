<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = new Menu();
        $menu->name = "Ayam Goreng";
        $menu->restaurantId = 1;
        $menu->description = "Ayam goreng enak";
        $menu->price = 20000;
        $menu->save();

        $menu1 = new Menu();
        $menu1->name = "Nasi Goreng";
        $menu1->restaurantId = 2;
        $menu1->description = "Nasi oOreng dengan Telur";
        $menu1->price = 23000;

        $menu1->save();
    }
}
