<?php

namespace Database\Seeders;

use App\Models\Parts;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $vehicles = Vehicle::all();

        foreach ($vehicles as $vehicle) {
            Parts::factory()->count(3)->create([
                'vehicle_id' => $vehicle->id,
            ]);
        }
    }
}
