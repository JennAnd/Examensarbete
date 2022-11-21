<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Yogaclass;
use App\Models\Membership;

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

        // \App\Models\User::factory()->create([
        //     'firstname' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $users = [
            new User([
                'firstname' => 'Jennifer',
                'lastname' => 'Andersson',
                'email' => 'jennifer@anandayoga.com',
                'password' => Hash::make('anandayoga'),
                'address' => 'Beraban, Kediri, Tabanan Regency',
                'postal_code' => 82121,
                'city' => 'Bali',
                'country' => 'Indonesia',
                'is_admin' => 1,
            ]),

            new User([
                'firstname' => 'Hanna',
                'lastname' => 'Wulff',
                'email' => 'hanna@wulff.com',
                'password' => Hash::make('hannawulff'),
                'address' => 'Lärdomsgatan 3',
                'postal_code' => 41756,
                'city' => 'Gothenburg',
                'country' => 'Sweden',
                'is_admin' => 0,
            ])
        ];

        foreach ($users as $user) {
            $user->save();
        }

        $memberships = [
            new Membership([
                'type' => "Single class",
                'price' => 25,
                'amount_classes' => 1
            ]),
            new Membership([
                'type' => "5 classes",
                'price' => 100,
                'amount_classes' => 5
            ]),
            new Membership([
                'type' => "10 classes",
                'price' => 190,
                'amount_classes' => 10
            ]),
            new Membership([
                'type' => "20 classes",
                'price' => 360,
                'amount_classes' => 20
            ]),

        ];

        foreach ($memberships as $membership) {
            $membership->save();
        }



        $yogaclasses = [
            new Yogaclass([
                'class_name' => "Hatha Yoga",
                'teacher' => "Jennifer Andersson",
                'datetime' => date('Y-m-d H:i', strtotime('+1 day 17:00')),
                'length' => 60,
                'available' => 12,
                'reserved' => 3,
            ]),
            new Yogaclass([
                'class_name' => "Vinyasa Yoga",
                'teacher' => "Susanne Lam",
                'datetime' => date('Y-m-d H:i', strtotime('+2 days 19:00')),
                'length' => 60,
                'available' => 7,
                'reserved' => 8,
            ]),
            new Yogaclass([
                'class_name' => "Yin Yoga",
                'teacher' => "Jennifer Andersson",
                'datetime' => date('Y-m-d H:i', strtotime('+3 days 09:00')),
                'length' => 90,
                'available' => 4,
                'reserved' => 11,
            ]),
            new Yogaclass([
                'class_name' => "Kundalini Yoga",
                'teacher' => "Susanne Lam",
                'datetime' => date('Y-m-d H:i', strtotime('+4 days 08:00')),
                'length' => 60,
                'available' => 5,
                'reserved' => 10,
            ]),
            new Yogaclass([
                'class_name' => "Ashtanga Yoga",
                'teacher' => "Jennifer Andersson",
                'datetime' => date('Y-m-d H:i', strtotime('+5 days 18:00')),
                'length' => 90,
                'available' => 9,
                'reserved' => 6,
            ]),
            new Yogaclass([
                'class_name' => "Hot Yoga",
                'teacher' => "Susanne Lam",
                'datetime' => date('Y-m-d H:i', strtotime('+6 days 17:00')),
                'length' => 60,
                'available' => 12,
                'reserved' => 3,
            ]),
        ];

        foreach ($yogaclasses as $yogaclass) {
            $yogaclass->save();
        }
    }
}
