<?php

namespace Database\Seeders;

use App\Models\Liste;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Liste::factory()->count(10)->create([
            'user_id' => 2,
            'group_id' => 3
        ]);
    }
}
