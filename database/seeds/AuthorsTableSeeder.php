<?php

use Illuminate\Database\Seeder;
use App\Author;
use Faker\Factory as Faker;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
        for ($i=0; $i < 10 ; $i++) {
          $author = new Author;
          $author->name = $faker-> name;
          $author->age = rand(18,100);
          $author->address = $faker-> address;
          $author->save();
        }
    }
}
