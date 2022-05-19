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
     
            $path = $this->faker->file('storage/app/public/files');
        return [
            'niveau_examen' => $this->faker->string(),
            'matiere_examen' => $this->faker->string(),
            'annee_examen' => $this->faker->year(),
            
            'examen'=>$path ,
            'url_examen' => config('app.url') . '/storage/' .Str::after($path, 'public/'),
        ];
      
    }
}
