<?php

namespace Database\Factories;

use App\Models\Space;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpaceFactory extends Factory
{
    protected $model = Space::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'address' => $this->faker->address(),
            'web_url' => $this->faker->url(),
            'type_id' => Type::factory(), // Aquí se crea un Type relacionado.
            'image_path' => 'storage/images/space.jpg', // O ajusta a cómo manejas las imágenes.
        ];
    }
}
