<?php

namespace Tests\Feature;

use App\Models\Interests;
use App\Models\Language;
use App\Models\People;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;

class CrudPeopleTestCase extends TestCase
{
    /**
     * @return Model
     */
    protected function people(): Model
    {
        return People::factory()->create();
    }

    /**
     * @return Model
     */
    protected function user(): Model
    {
        return User::factory()->create();
    }

    /**
     * @return Model
     */
    protected function language(): Model
    {
        return Language::factory()->create();
    }

    /**
     * @return Model
     */
    protected function interests(): Model
    {
        return Interests::factory()->create();
    }
}
