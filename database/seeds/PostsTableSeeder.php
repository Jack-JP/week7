<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i=0; $i < 20; $i++) {
          App\Post::create([
            'title' => $faker->sentence,
            'body' => $faker->text,
            'image' => 'https://www.hoodprotectors.ca/wp-content/uploads/2016/10/product_image_placeholder-400x300.png',
            'slug' => str_slug($faker->sentence, '-'),
            'user_id' => 1,
            'category_id' => 1,
          ]);
        }

    }
}
