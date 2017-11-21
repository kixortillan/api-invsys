<?php

namespace Tests\Feature\Sku;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class SkuControllerTest extends TestCase
{
    use RefreshDatabase,
        WithoutMiddleware;

    private $user;

    public function __construct()
    {
        parent::__construct();
        //$this->user = factory(\App\User::class)->create();
    }

    private function authWithPassport()
    {
        //Passport::actingAs($this->user, ['*']);
    }

    /**
     * Test store creating a new sku in database.
     *
     * @return void
     */
    public function testStore()
    {
        //$this->authWithPassport();
        $code = $this->faker->word;
        $desc = $this->faker->sentence;

        $response = $this->json('POST', 'api/skus', ['sku' => $code, 'desc' => $desc]);

        $response->assertStatus(200)
            ->assertJsonFragment([
                'sku' => $code,
                'desc' => $desc,
            ]);
    }
}
