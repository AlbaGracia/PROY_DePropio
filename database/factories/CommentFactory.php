<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * El nombre del modelo que esta fábrica está creando.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Definir el estado predeterminado de la fábrica.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'text' => $this->faker->sentence(), // Texto aleatorio del comentario
            'user_id' => User::factory(), // Relaciona con un usuario existente
            'event_id' => Event::factory(), // Relaciona con un evento existente
            'publish_date' => $this->faker->dateTimeThisYear(), // Fecha de publicación
        ];
    }
}
