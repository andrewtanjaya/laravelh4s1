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
        $menu1->restaurantId = 1;
        $menu1->description = "Nasi goreng dengan telur";
        $menu1->price = 23000;
        $menu1->save();

        $menu2 = new Menu();
        $menu2->name = "Cumi Goreng Tepung";
        $menu2->restaurantId = 2;
        $menu2->description = "Cumi gurih dan garing";
        $menu2->price = 17500;
        $menu2->save();

        $menu3 = new Menu();
        $menu3->name = "Spaghetti Bolong";
        $menu3->restaurantId = 2;
        $menu3->description = "Spaghetti sedap";
        $menu3->price = 33000;
        $menu3->save();

        $menu4 = new Menu();
        $menu4->name = "Sarimakmur";
        $menu4->restaurantId = 2;
        $menu4->description = "Sari buah sedap pengganjal lapar";
        $menu4->price = 15500;
        $menu4->save();

        $menu3 = new Menu();
        $menu3->name = "Spaghetti Bolong";
        $menu3->restaurantId = 2;
        $menu3->description = "Spaghetti sedap";
        $menu3->price = 33000;
        $menu3->save();

        $menu4 = new Menu();
        $menu4->name = "Es Buah Serut";
        $menu4->restaurantId = 3;
        $menu4->description = "Es buah dengan menggunakan es serut";
        $menu4->price = 9000;
        $menu4->save();
    }
}
