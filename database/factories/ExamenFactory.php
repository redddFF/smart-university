<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Examen>
 */
class ExamenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
     
            $path = $this->faker->image('storage/app/public/images', 640, 800, 'examen', true, true, 'examen', false);
        return [
            'titre_examen' => $this->faker->word(),
            'niveau_examen' => $this->faker->word(),
            'matiere_examen' => $this->faker->sentence(),
            'annee_examen' => $this->faker->year(),
            'examen'=>$path ,
            'url_examen' => config('app.url') . '/storage/' .Str::after($path, 'public/'),
        ];
      
    }
}
