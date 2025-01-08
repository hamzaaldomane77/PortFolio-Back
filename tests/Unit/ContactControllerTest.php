<?php

namespace Tests\Unit;

use App\Models\Contact;
use App\Models\User;
use PHPUnit\Framework\TestCase;
use Tests\TestCase as TestsTestCase;

class ContactControllerTest extends TestsTestCase
{

    public function testIndexMethod()
    {
        $contacts = Contact::factory()->count(3)->create();
        $user = User::first();
        $response = $this->withHeaders(['Accept' => 'application/json'])
            ->actingAs($user)
            ->get('/api/concats');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'email',
                    'subject',
                    'message',
                ],
            ],
            'message',
        ]);
    }

    public function test_store_method()
    {
        $data = [
            'name'    => 'John Doe',
            'email'   => 'john@example.com',
            'subject' => 'Test Subject',
            'message' => 'Test Message',
        ];

        $response = $this->withHeaders(['Accept' => 'application/json'])
            ->post('/api/concats-create', $data);
        $response->assertStatus(201);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'email',
                'subject',
                'message',
            ],
            'message',
        ]);
    }

    public function testShowMethod()
    {
        $contact = Contact::factory()->create();
        $user = User::first();
        $response = $this->withHeaders(['Accept' => 'application/json'])
            ->actingAs($user)
            ->get("/api/concats/$contact->id");
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'email',
                'subject',
                'message',
            ],
            'message',
        ]);
    }

    public function testDestroyMethod()
    {
        $contact = Contact::factory()->create();
        $user = User::first();
        $response = $this->withHeaders(['Accept' => 'application/json'])
            ->actingAs($user)
            ->delete("/api/concats/{$contact->id}/delete");
        $response->assertStatus(200);
        $this->assertSoftDeleted('contacts', ['id' => $contact->id]);
    }
}
