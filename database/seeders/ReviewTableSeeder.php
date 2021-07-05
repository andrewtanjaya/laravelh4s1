<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $review = new Review();
        $review->userid = 1;
        $review->restaurantid = 2;
        $review->description = "Enak sih";
        $review->rating = 3;

        $review->save();

        $review1 = new Review();
        $review1->userid = 2;
        $review1->restaurantid = 1;
        $review1->description = "Enak banget";
        $review1->rating = 4;

        $review1->save();
    }
}
