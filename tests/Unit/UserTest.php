<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @group testin
     * @return void
     */

    //Creating test for user registration
//    public function test_user_registration()
//    {
//        $response = $this->post('/register',[
//           'name'=>'Abhi',
//            'email'=>'test123@gmail.com',
//            'password' => 'test123!',
//            'password_confirmation'=>'test12!',
//        ]);
//
//        $response->assertRedirect('/home');
//    }
    public function test_user_login()
    {
        $response = $this->post('/login',[
            'email'=>'test123@gmail.com',
            'password' => 'test123!',
        ]);

        $response->assertRedirect('/home');
    }

//    public function test_hostel_search()
//    {
//        $response = $this->post('/user/hostels/search',[
//            'hostelSearch' => 'john'
//        ]);
//
//        $response->assertStatus(200);
//    }

//    public function test_user_review()
//    {
//        $response = $this->post('/user/review/1',[
//            'rating' => '3',
//            'reviewMessage' => 'very nice overall',
//        ]);
//
//        $response->assertStatus(200);
//    }

}


