<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaperWork>
 */
class PaperWorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $path = $this->faker->image('storage/app/public/images', 640, 800, 'paper', true, true, 'paper', false);
        return [
            'description'=>$this->faker->paragraph(),
            'titre_paperwork' => $this->faker->word(),
            'paperwork'=>$path ,
            'url_paperwork' => config('app.url') . '/storage/' .Str::after($path, 'public/'),
        ];
    }
}
