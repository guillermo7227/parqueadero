<?php

namespace Tests\Unit;

use App\Brand;
use App\Owner;
use App\User;
use App\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VehicleTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() : void
    {
        parent::setUp();
        $user = factory(User::class)->create();
        $this->actingAs($user);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testItSearchVehicles()
    {
        $this->seed();

        $owner = Owner::first();
        $brand = Brand::first();

        // buscar por placa
        $plate = rand();
        Vehicle::create([
            'brand_id' => $brand->id,
            'owner_id' => $owner->id,
            'plate' => $plate,
            'year' => 2020,
        ]);

        $response = $this->followingRedirects()->get(route('home')."?search={$plate}");

        $response->assertSee($plate);

        // buscar por nombre de propietario
        $owner = Owner::create(['name' => \Str::random(), 'identification' => rand()]);
        $plate = rand();
        Vehicle::create([
            'brand_id' => $brand->id,
            'owner_id' => $owner->id,
            'plate' => $plate,
            'year' => 2020,
        ]);

        $response = $this->followingRedirects()->get(route('home')."?search={$owner->name}");

        $response->assertSee($plate);

        // buscar por identificacion propietario
        $plate = rand();
        Vehicle::create([
            'brand_id' => $brand->id,
            'owner_id' => $owner->id,
            'plate' => $plate,
            'year' => 2020,
        ]);

        $response = $this->followingRedirects()->get(route('home')."?search={$owner->identification}");

        $response->assertSee($plate);
    }

    public function testItCreatesVehicle()
    {
        $this->seed();

        $owner = Owner::first();
        $brand = Brand::first();

        $plate = rand();
        $data = [
            'brand_id' => $brand->id,
            'owner_id' => $owner->id,
            'year' => 2020,
            'plate' => $plate,
        ];

        $this->post(route('vehicles.store', $data));

        $this->assertDatabaseHas('vehicles', ['plate' => $plate]);
    }
}
