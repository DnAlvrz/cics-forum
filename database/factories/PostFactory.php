<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //App\Models\Post::factory()->times(20)->create(['user_id'=>1]);
        return [
            'title'=>$this->faker->sentence(10),
            'description'=>$this->faker->sentence(100),
            'type'=>$this->faker->randomElement($array=array('Question', 'Tutorial','Guide','Urgent'))
        ];
    }
}
