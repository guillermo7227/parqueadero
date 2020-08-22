<?php

use App\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'name' => 'Toyota',
        ]);
        Brand::create([
            'name' => 'Mercedes Benz',
        ]);
        Brand::create([
            'name' => 'Chevrolet',
        ]);
        Brand::create([
            'name' => 'Tesla',
        ]);
        Brand::create([
            'name' => 'Audi',
        ]);
        Brand::create([
            'name' => 'Mazda',
        ]);
        Brand::create([
            'name' => 'Ford',
        ]);
        Brand::create([
            'name' => 'Dodge',
        ]);
        Brand::create([
            'name' => 'Kia',
        ]);
    }
}
