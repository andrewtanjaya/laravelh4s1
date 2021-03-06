<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resto = new Restaurant();
        $resto->name = 'SOlaria';
        $resto->description = 'makanan sini ga enak tp mahal';
        $resto->address = 'Jalan Kambing';
        $resto->phone = '02177328898';

        $resto->save();

        $resto1 = new Restaurant();
        $resto1->name = 'SO resto';
        $resto1->description = 'lebih enak dari SOlaria';
        $resto1->address = 'Jalan Ayam';
        $resto1->phone = '02177898898';

        $resto1->save();

        $resto2 = new Restaurant();
        $resto2->name = 'Bebek Tepi Got';
        $resto2->description = 'Makan di tepi Got hanya di Bebek Tepi Got';
        $resto2->address = 'Jalan Bebek';
        $resto2->phone = '02177898222';

        $resto2->save();
    }

}
