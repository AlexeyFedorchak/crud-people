<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\People;
use App\Models\User;
use Illuminate\Database\Seeder;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        People::factory()
            ->count(5)
            ->create();
    }
}
