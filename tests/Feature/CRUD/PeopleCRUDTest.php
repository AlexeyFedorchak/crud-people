<?php

namespace Tests\Feature\Auth;

use Tests\Feature\CrudPeopleTestCase;

class PeopleCRUDTest extends CrudPeopleTestCase
{
    /**
     * @return void
     */
    public function test_assert_user_can_access_people()
    {
        $response = $this
            ->actingAs($this->user())
            ->get('/people');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_assert_user_can_access_detail_people()
    {
        $response = $this
            ->actingAs($this->user())
            ->get(route('people.show', ['people' => $this->people()]));

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_assert_user_can_create_people()
    {
        $response = $this
            ->actingAs($this->user())
            ->get(route('people.create.show', ['people' => $this->people()]));

        $response->assertStatus(200);
    }
}
