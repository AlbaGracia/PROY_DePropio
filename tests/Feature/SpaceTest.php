<?php

namespace Tests\Feature;

use App\Models\Space;
use App\Models\Type;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SpaceTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_space_with_valid_data()
    {
        Storage::fake('public');

        $type = Type::factory()->create();

        $data = [
            'name' => 'Espacio de prueba',
            'description' => 'Descripción de prueba',
            'address' => 'Dirección falsa 123',
            'web_url' => 'https://espacio-prueba.com',
            'type_id' => $type->id,
        ];

        $response = $this->post(route('space.store'), $data);

        $response->assertRedirect();

        $this->assertDatabaseHas('spaces', [
            'name' => 'Espacio de prueba',
            'address' => 'Dirección falsa 123',
            'web_url' => 'https://espacio-prueba.com',
        ]);
    }

    #[Test]
    public function it_can_edit_an_existing_space()
    {
        $type = Type::factory()->create();
        $space = Space::factory()->create([
            'name' => 'Viejo nombre',
            'type_id' => $type->id,
        ]);

        $updatedData = [
            'name' => 'Nuevo nombre',
            'description' => 'Nueva descripción',
            'address' => 'Nueva dirección',
            'web_url' => 'https://nuevo-url.com',
            'type_id' => $type->id,
        ];

        $response = $this->put(route('space.update', $space->id), $updatedData);

        $response->assertRedirect();

        $this->assertDatabaseHas('spaces', [
            'id' => $space->id,
            'name' => 'Nuevo nombre',
            'address' => 'Nueva dirección',
        ]);
    }
}
