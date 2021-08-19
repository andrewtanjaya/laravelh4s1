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
        $review->restaurantid = 1;
        $review->description = "Enak sih";
        $review->rating = 3;
        $review->save();

        $review1 = new Review();
        $review1->userid = 3;
        $review1->restaurantid = 1;
        $review1->description = "Enak banget";
        $review1->rating = 4;
        $review1->save();

        $review2 = new Review();
        $review2->userid = 1;
        $review2->restaurantid = 2;
        $review2->description = "Enak sangatt";
        $review2->rating = 5;
        $review2->save();

        $review3 = new Review();
        $review3->userid = 1;
        $review3->restaurantid = 3;
        $review3->description = "Suka sih sama suasana restorannya";
        $review3->rating = 3;
        $review3->save();

        $review4 = new Review();
        $review4->userid = 3;
        $review4->restaurantid = 3;
        $review4->description = "Jelek tempatnya :(";
        $review4->rating = 1;
        $review4->save();
    }
}
