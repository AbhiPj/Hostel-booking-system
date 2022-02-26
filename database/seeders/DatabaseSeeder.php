<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([[
            'name' => "Admin",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Test123!'),
            'userType' => "vendor"
        ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('Test123!'),
                'userType' => "user"
            ], [
                    'name' => 'User2',
                    'email' => 'user2@gmail.com',
                    'password' => Hash::make('Test123!'),
                    'userType' => "vendor"
                ]
                ]
        );
        DB::table('hostels')->insert([[
                'hostelName' => "John's sanctuary",
                'userId' => "1",
                'about' => "hostel description",
                'location' => "Kathmandu",
                'district' => "Jhapa",
                'additionalImages' => "4057165.jpg",
                'primaryImg' => "Tperry-1920x1200.jpg",
            ],
                [
                    'hostelName' => "Plaza place",
                    'userId' => "3",
                    'about' => "hostel description",
                    'location' => "Kathmandu",
                    'district' => "Jhapa",
                    'additionalImages' => "4057165.jpg",
                    'primaryImg' => "Tperry-1920x1200.jpg",
                ]
            ]);

        DB::table('roomtype')->insert([[
                'roomType' => "Single bed",
                'hostelId' => '1'
            ],
                [
                    'roomType' => "Single bed",
                    'hostelId' => '2'
                ],
                ]
        );

        DB::table('rooms')->insert([[
                'roomName' => "Single bed",
                'roomType' => '1',
                'about' => 'about section',
                'price' => "500",
                'primaryImg' => "download.jpg",
                'additionalImages' => "Tperry-1920x1200.jpg",
                'hostelId' => '1'
            ],
                [
                    'roomName' => "Double bed",
                    'roomType' => '1',
                    'about' => 'about section',
                    'price' => "1000",
                    'primaryImg' => "download.jpg",
                    'additionalImages' => "Tperry-1920x1200.jpg",
                    'hostelId' => '1'
                ],
                [
                    'roomName' => "King size",
                    'roomType' => '1',
                    'about' => 'about section',
                    'price' => "1500",
                    'primaryImg' => "download.jpg",
                    'additionalImages' => "Tperry-1920x1200.jpg",
                    'hostelId' => '1'
                ],
                [
                    'roomName' => "King size",
                    'roomType' => '1',
                    'about' => 'about section',
                    'price' => "1500",
                    'primaryImg' => "download.jpg",
                    'additionalImages' => "Tperry-1920x1200.jpg",
                    'hostelId' => '2'
                ],
            ]);
    }
}
