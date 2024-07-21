<?php

namespace Database\Seeders;

use App\Models\GuruModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        GuruModel::factory(10)->create();
    }
}
