<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $path = $this->faker->image('storage/app/public/images', 640, 800, 'sport', true, true, 'sport', false);
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->words(2, true),
            
            // 'poster' => $this->faker->imageUrl(360, 360, true),
            'poster' => $path,
            'urlPoster' => config('app.url') . '/storage/' . Str::after($path, 'public/'),
            'dateDebut' => $this->faker->date(),
            'dateFin' => $this->faker->date(),
        ];
    }
}
