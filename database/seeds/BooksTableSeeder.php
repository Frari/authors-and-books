<?php

use Illuminate\Database\Seeder;
use App\Book;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
        for ($i=0; $i < 30 ; $i++) {
          $book = new Book;
          $book->name = $faker-> sentence(3);
          $book->release_date = rand(1900,2019);
          $book->author_id = rand(1,10);
          $book->save();
        }
    }
}
