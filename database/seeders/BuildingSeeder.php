<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($id=1; $id <= 10; $id++) {
            # code...
            DB::table('buildings')->insert([
                [
                    'id' => $id, 'name' => 'Banner Points '.$id, 'base' => 10, 'multiplier' => 118, 'cost_building_class' => '1',
                    'description' => 'Banners are easy to setup, they show the message and wants of the protestors, what the objective of the GotaGoGama should be. You put any banners in the place where banner slots are available as you want and each one will generate loyalty points.
                    <br/>
                    Banners messages are subjective and can create feelings of disagreement, which create negative points, but banners create more positive points to offset the negative points. They build loyalty when visitors who come read the messages, and when PR photos take these messages into the media both locally and internationally'
                ],
            ]);
        }

        DB::table('buildings')->insert([
            ['id' => 11, 'name' => 'Donation Collection Points', 'base' => 80, 'multiplier' => 600, 'cost_building_class' => '2',
                'description' => 'Donations help build the GotaGoGamma, anyone who wants can donate any type thing that is beneficial to the collective. These will be used to make the GotaGoGamma long term protest a sustainable long term occupancy. Donation Collection Points will generate donations every hour based on the level of production.
                <br/>
                There will always be accusations that donations are coming from foreign benefactors or people acting against the interests of Sri Lanka, these are typical propaganda organized by the pro government rumor mills'
            ],
        ]);

        for ($id=12; $id <= 13; $id++) {
            DB::table('buildings')->insert([
                ['id' => $id, 'name' => 'One Galle Face Restuarants '.$id - 11, 'base' => 160, 'multiplier' => 620, 'cost_building_class' => '3',
                    'description' => 'Local capitalistic restaurants nearby will places that will benefit from the large crowds, while they may not show support. It is undeniable that there is mutual benefit from the large presence. If the protest is peaceful they may provide discounts that unrelated to the protest but helpful nonetheless'
                ],
            ]);
        }

        DB::table('buildings')->insert([
            ['id' => 14, 'name' => 'Food Station 1', 'base' => 180, 'multiplier' => 60, 'cost_building_class' => '4',
                'description' => ''
            ],
            ['id' => 15, 'name' => 'Food Station 2', 'base' => 180, 'multiplier' => 60, 'cost_building_class' => '4',
                'description' => ''
            ],
            ['id' => 16, 'name' => 'Maliban', 'base' => 200, 'multiplier' => 350, 'cost_building_class' => '5',
                'description' => ''
            ],
            ['id' => 17, 'name' => 'University Rally Point 1', 'base' => 40, 'multiplier' => 215, 'cost_building_class' => '6',
                'description' => 'University are representation not the just of scholars but also the youth demographic, there has been a long since despise of the youth in Sri Lanka, typically cast aside as violent or destructive, they play a key role in protests as they have both the time, energy and passion to carry out the protests.
                In times of attacks these people are the most vulnerable and therefore will respond in kind when threatened. A saturation of the youth can also give way for the government to shutdown the protests calling it a juvenile attempt, it is important maintain a good protestor diversity'
            ],
            ['id' => 18, 'name' => 'University Rally Point 2', 'base' => 40, 'multiplier' => 215, 'cost_building_class' => '6',
                'description' => 'University are representation not the just of scholars but also the youth demographic, there has been a long since despise of the youth in Sri Lanka, typically cast aside as violent or destructive, they play a key role in protests as they have both the time, energy and passion to carry out the protests.
                In times of attacks these people are the most vulnerable and therefore will respond in kind when threatened. A saturation of the youth can also give way for the government to shutdown the protests calling it a juvenile attempt, it is important maintain a good protestor diversity'
            ],
            ['id' => 19, 'name' => 'Rally Point', 'base' => 260, 'multiplier' => 230, 'cost_building_class' => '7',
                'description' => ''
            ],
            ['id' => 20, 'name' => 'Lawyers Tent', 'base' => 120, 'multiplier' => 323, 'cost_building_class' => '8',
                'description' => ''
            ],
        ]);

        for ($id=21; $id <= 26; $id++) {
            DB::table('buildings')->insert([
                ['id' => $id, 'name' => 'Tent '.$id - 20, 'base' => 180, 'multiplier' => 560, 'cost_building_class' => '9',
                    'description' => ''
                ],
            ]);
        }

        DB::table('buildings')->insert([
            ['id' => 27, 'name' => 'Library', 'base' => 380, 'multiplier' => 810, 'cost_building_class' => '10',
                'description' => ''
            ],
            ['id' => 28, 'name' => 'Red Cross', 'base' => 200, 'multiplier' => 1030, 'cost_building_class' => '11',
                'description' => ''
            ],
        ]);

        for ($id=29; $id <= 35; $id++) {
            DB::table('buildings')->insert([
                ['id' => $id, 'name' => 'Small Vendor '.$id, 'base' => 120, 'multiplier' => 58, 'cost_building_class' => '12',
                    'description' => ''
                ],
            ]);
        }

        for ($id=36; $id <= 40; $id++) {
            DB::table('buildings')->insert([
                ['id' => $id, 'name' => 'Large Vendor '.$id, 'base' => 480, 'multiplier' => 23, 'cost_building_class' => '13',
                    'description' => ''
                ],
            ]);
        }
    }
}
