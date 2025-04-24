<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Space;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_event_with_valid_data_and_existing_space()
    {
        $category = Category::factory()->create();

        $space = Space::factory()->create();

        $data = [
            'name' => 'Evento de prueba',
            'description' => 'Descripción del evento de prueba',
            'start_date' => now(),
            'end_date' => now()->addDays(2),
            'price' => 100,
            'web_url' => 'https://evento-prueba.com',
            'space_id' => $space->id,
            'category_id' => $category->id, // Usamos una categoría válida
        ];

        $response = $this->post(route('event.store'), $data);

        $response->assertRedirect();

        $this->assertDatabaseHas('events', [
            'name' => 'Evento de prueba',
            'space_id' => $space->id,
            'category_id' => $category->id,
        ]);
    }
}
