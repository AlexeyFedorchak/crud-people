<?php

namespace Database\Seeders;

use App\Models\Interests;
use Illuminate\Database\Seeder;

class InterestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Interests::factory()
            ->count(3)
            ->create();
    }
}
