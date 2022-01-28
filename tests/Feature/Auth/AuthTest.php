<?php

namespace Tests\Feature\Auth;

use Illuminate\Support\Str;
use Tests\Feature\CrudPeopleTestCase;

class AuthTest extends CrudPeopleTestCase
{
    /**
     * @return void
     */
    public function test_assert_home_page_redirects_to_login()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    /**
     * @return void
     */
    public function test_assert_login_page_available()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_assert_register_page_available()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_assert_people_not_available_for_guest()
    {
        $response = $this->get('/people');

        $response->assertStatus(302);
    }

    /**
     * @return void
     */
    public function test_assert_people_available_only_for_users()
    {
        $response = $this
            ->actingAs($this->user())
            ->get('/people');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_assert_user_can_be_created()
    {
        $response = $this
            ->post(route('register.post'), [
                'name' => 'test',
                'email' => 'test' . Str::random() . '@m.com',
                'password' => 'secret'
            ]);

        $response->assertStatus(302);
    }

    /**
     * @return void
     */
    public function test_assert_user_can_be_authorized()
    {
        $response = $this
            ->post(route('login.post'), [
                'email' => $this->user()->email,
                'password' => 'secret'
            ]);

        $response->assertStatus(302);
    }
}
