<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * Parses and verifies the doc comments for files.
 *
 * PHP version 7.4
 *
 * @category  PHP
 * @package   None
 * @author    Miles Selim <milesbalata@gmail.com>
 * @copyright 2021-2021 Laravel Mock
 * @license   BSD Licence
 * @link      None
 */
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
        return [
            'title' => $this->faker->name,
            'content' => $this->faker->paragraph
        ];
    }
}
