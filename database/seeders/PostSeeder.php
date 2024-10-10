<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Post;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<20; $i++){

            $post = new Post();

            $post->title = $faker->sentence(3);
            $post->content = $faker->text(500);
            $post->slug = Str::slug($post->title, '-');

            $post->save();

        }
    }
}
