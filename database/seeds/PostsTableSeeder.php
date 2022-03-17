<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        for($i = 0 ; $i <10; $i++){
            $newPost = new Post();
            $newPost->title = $faker->text(20);
            $newPost->content = $faker->text(255);
            $newPost->img = $faker->text(255);
            $newPost->slug = Str::slug($newPost['title']);
            $newPost->save();
        }
    }
}
