<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create([
            'id' => 1,
            'email' => 'voxsar@gmail.com'
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('buildings')->insert([
            [
                'id' => 1, 'name' => 'Banner Points', 'base' => 30, 'multiplier' => 118,
                'description' => 'Banners are easy to setup, they show the message and wants of the protestors, what the objective of the GotaGoGama should be. You put any banners in the place where banner slots are available as you want and each one will generate loyalty points.
                <br/>
                Banners messages are subjective and can create feelings of disagreement, which create negative points, but banners create more positive points to offset the negative points. They build loyalty when visitors who come read the messages, and when PR photos take these messages into the media both locally and internationally'
            ],
            ['id' => 2, 'name' => 'Donation Collection Points', 'base' => 80, 'multiplier' => 600,
                'description' => 'Donations help build the GotaGoGamma, anyone who wants can donate any type thing that is beneficial to the collective. These will be used to make the GotaGoGamma long term protest a sustainable long term occupancy. Donation Collection Points will generate donations every hour based on the level of production.
                <br/>
                There will always be accusations that donations are coming from foreign benefactors or people acting against the interests of Sri Lanka, these are typical propaganda organized by the pro government rumor mills'
            ],
                ['id' => 3, 'name' => 'One Galle Face Restuarants', 'base' => 160, 'multiplier' => 620,
                'description' => 'Local capitalistic restaurants nearby will places that will benefit from the large crowds, while they may not show support. It is undeniable that there is mutual benefit from the large presence. If the protest is peaceful they may provide discounts that unrelated to the protest but helpful nonetheless'
            ],
                ['id' => 4, 'name' => 'Food Station', 'base' => 180, 'multiplier' => 60,
                'description' => ''
            ],
                ['id' => 5, 'name' => 'Maliban', 'base' => 200, 'multiplier' => 350,
                'description' => ''
            ],
            ['id' => 6, 'name' => 'University Rally Point', 'base' => 40, 'multiplier' => 215,
                'description' => 'University are representation not the just of scholars but also the youth demographic, there has been a long since despise of the youth in Sri Lanka, typically cast aside as violent or destructive, they play a key role in protests as they have both the time, energy and passion to carry out the protests.
                In times of attacks these people are the most vulnerable and therefore will respond in kind when threatened. A saturation of the youth can also give way for the government to shutdown the protests calling it a juvenile attempt, it is important maintain a good protestor diversity'
            ],
            ['id' => 7, 'name' => 'Rally Point', 'base' => 260, 'multiplier' => 230,
                'description' => ''
            ],
            ['id' => 8, 'name' => 'Lawyers Tent', 'base' => 120, 'multiplier' => 323,
                'description' => ''
            ],
            ['id' => 9, 'name' => 'Tents', 'base' => 180, 'multiplier' => 560,
                'description' => ''
            ],
            ['id' => 10, 'name' => 'Library', 'base' => 380, 'multiplier' => 810,
                'description' => ''
            ],
            ['id' => 11, 'name' => 'Red Cross', 'base' => 200, 'multiplier' => 1030,
                'description' => ''
            ],
            ['id' => 12, 'name' => 'Small Vendors', 'base' => 120, 'multiplier' => 58,
                'description' => ''
            ],
            ['id' => 13, 'name' => 'Large Vendors', 'base' => 480, 'multiplier' => 23,
                'description' => ''
            ],
        ]);

        DB::table('resources')->insert([
            ['id' => 1, 'name' => 'Food', 'description' => 'Food is the great unitor of any cause, since the time of the cave people, people have gather around to break bread with their friends, setting aside differences. The more food you have for your protestors the more energetic they will be to stand up to curruption'],
            ['id' => 2, 'name' => 'Donations', 'description' => 'Donations are done by anyone, all struggles are build with resources provided by the collective. It is important that these donations are not politizied, a non violent peaceful protest that is non partisian grows resources slow due to this reason'],
            ['id' => 3, 'name' => 'Postive Points', 'description' => 'All eyes are on the protest, every action taken will be interpreted as postive or negative in terms of PR, and protest depends on the pressure they put on government officials, the pressure and momentum they have is built by the postive PR and relations they have with the public and people they represent'],
            ['id' => 4, 'name' => 'Negative Points', 'description' => 'Pro Government has more power to paint false narratives, but all false narratives are built around nugets of truth either misinterpreted or manupuliated, protestors must be smart not allow their actions to leave the door wide open for mis interpretations, but unfortunately every action is up for critisim, protestors must learn not allow themselves to be baited'],
            ['id' => 5, 'name' => 'Loyalty', 'description' => 'When the collective actually starts to serving their purpose, or taking a step in the right direction, it build loyalty by the protestors'],
        ]);

        DB::table('building_requirements')->insert([
            ['building_id' => 2, 'cost_building_id' => 1, 'level' => 2, 'min' => 1],
            ['building_id' => 3, 'cost_building_id' => 2, 'level' => 4, 'min' => 2],
            ['building_id' => 4, 'cost_building_id' => 2, 'level' => 2, 'min' => 3],
            ['building_id' => 5, 'cost_building_id' => 3, 'level' => 1, 'min' => 1],
            ['building_id' => 5, 'cost_building_id' => 4, 'level' => 2, 'min' => 2],
            ['building_id' => 6, 'cost_building_id' => 1, 'level' => 4, 'min' => 4],
            ['building_id' => 7, 'cost_building_id' => 6, 'level' => 2, 'min' => 1],
            ['building_id' => 8, 'cost_building_id' => 6, 'level' => 2, 'min' => 2],
            ['building_id' => 9, 'cost_building_id' => 7, 'level' => 4, 'min' => 1],
            ['building_id' => 9, 'cost_building_id' => 8, 'level' => 3, 'min' => 1],
            ['building_id' => 10, 'cost_building_id' => 8, 'level' => 3, 'min' => 1],
            ['building_id' => 11, 'cost_building_id' => 9, 'level' => 4, 'min' => 1],
            ['building_id' => 12, 'cost_building_id' => 1, 'level' => 6, 'min' => 2],
            ['building_id' => 13, 'cost_building_id' => 12, 'level' => 2, 'min' => 2],
        ]);

        DB::table('building_costs')->insert([
            ['building_id' => 1, 'resource_id' => 1, 'cost' => -320],
            ['building_id' => 1, 'resource_id' => 2, 'cost' => -240],
            ['building_id' => 1, 'resource_id' => 3, 'cost' => 4],
            ['building_id' => 1, 'resource_id' => 4, 'cost' => 2],
            ['building_id' => 1, 'resource_id' => 5, 'cost' => 20],
        ]);

        DB::table('building_costs')->insert([
            ['building_id' => 2, 'resource_id' => 1, 'cost' => -140],
            ['building_id' => 2, 'resource_id' => 2, 'cost' => -160],
            ['building_id' => 2, 'resource_id' => 3, 'cost' => 8],
            ['building_id' => 2, 'resource_id' => 4, 'cost' => 3],
            ['building_id' => 2, 'resource_id' => 5, 'cost' => 78],
        ]);

        DB::table('building_costs')->insert([
            ['building_id' => 3, 'resource_id' => 1, 'cost' => -780],
            ['building_id' => 3, 'resource_id' => 2, 'cost' => -460],
            ['building_id' => 3, 'resource_id' => 3, 'cost' => 0],
            ['building_id' => 3, 'resource_id' => 4, 'cost' => 30],
            ['building_id' => 3, 'resource_id' => 5, 'cost' => -20],
        ]);

        DB::table('building_costs')->insert([
            ['building_id' => 4, 'resource_id' => 1, 'cost' => -380],
            ['building_id' => 4, 'resource_id' => 2, 'cost' => -260],
            ['building_id' => 4, 'resource_id' => 3, 'cost' => 70],
            ['building_id' => 4, 'resource_id' => 4, 'cost' => 0],
            ['building_id' => 4, 'resource_id' => 5, 'cost' => 40],
        ]);

        DB::table('building_costs')->insert([
            ['building_id' => 5, 'resource_id' => 1, 'cost' => -412],
            ['building_id' => 5, 'resource_id' => 2, 'cost' => -512],
            ['building_id' => 5, 'resource_id' => 3, 'cost' => 90],
            ['building_id' => 5, 'resource_id' => 4, 'cost' => 30],
            ['building_id' => 5, 'resource_id' => 5, 'cost' => 100],
        ]);

        DB::table('building_costs')->insert([
            ['building_id' => 6, 'resource_id' => 1, 'cost' => -352],
            ['building_id' => 6, 'resource_id' => 2, 'cost' => -262],
            ['building_id' => 6, 'resource_id' => 3, 'cost' => 90],
            ['building_id' => 6, 'resource_id' => 4, 'cost' => 90],
            ['building_id' => 6, 'resource_id' => 5, 'cost' => 100],
        ]);

        DB::table('building_costs')->insert([
            ['building_id' => 7, 'resource_id' => 1, 'cost' => -450],
            ['building_id' => 7, 'resource_id' => 2, 'cost' => -862],
            ['building_id' => 7, 'resource_id' => 3, 'cost' => 190],
            ['building_id' => 7, 'resource_id' => 4, 'cost' => 30],
            ['building_id' => 7, 'resource_id' => 5, 'cost' => 200],
        ]);

        DB::table('building_costs')->insert([
            ['building_id' => 8, 'resource_id' => 1, 'cost' => -654],
            ['building_id' => 8, 'resource_id' => 2, 'cost' => -1320],
            ['building_id' => 8, 'resource_id' => 3, 'cost' => 300],
            ['building_id' => 8, 'resource_id' => 4, 'cost' => 70],
            ['building_id' => 8, 'resource_id' => 5, 'cost' => 170],
        ]);

        DB::table('building_costs')->insert([
            ['building_id' => 9, 'resource_id' => 1, 'cost' => -650],
            ['building_id' => 9, 'resource_id' => 2, 'cost' => -380],
            ['building_id' => 9, 'resource_id' => 3, 'cost' => 160],
            ['building_id' => 9, 'resource_id' => 4, 'cost' => 60],
            ['building_id' => 9, 'resource_id' => 5, 'cost' => 150],
        ]);

        DB::table('building_costs')->insert([
            ['building_id' => 10, 'resource_id' => 1, 'cost' => -1790],
            ['building_id' => 10, 'resource_id' => 2, 'cost' => -3650],
            ['building_id' => 10, 'resource_id' => 3, 'cost' => 430],
            ['building_id' => 10, 'resource_id' => 4, 'cost' => 20],
            ['building_id' => 10, 'resource_id' => 5, 'cost' => 250],
        ]);

        DB::table('building_costs')->insert([
            ['building_id' => 11, 'resource_id' => 1, 'cost' => -1280],
            ['building_id' => 11, 'resource_id' => 2, 'cost' => -2310],
            ['building_id' => 11, 'resource_id' => 3, 'cost' => 250],
            ['building_id' => 11, 'resource_id' => 4, 'cost' => 0],
            ['building_id' => 11, 'resource_id' => 5, 'cost' => 270],
        ]);

        DB::table('building_costs')->insert([
            ['building_id' => 12, 'resource_id' => 1, 'cost' => -1400],
            ['building_id' => 12, 'resource_id' => 2, 'cost' => -900],
            ['building_id' => 12, 'resource_id' => 3, 'cost' => 390],
            ['building_id' => 12, 'resource_id' => 4, 'cost' => 50],
            ['building_id' => 12, 'resource_id' => 5, 'cost' => 270],
        ]);

        DB::table('building_costs')->insert([
            ['building_id' => 13, 'resource_id' => 1, 'cost' => -2750],
            ['building_id' => 13, 'resource_id' => 2, 'cost' => -1862],
            ['building_id' => 13, 'resource_id' => 3, 'cost' => 790],
            ['building_id' => 13, 'resource_id' => 4, 'cost' => 200],
            ['building_id' => 13, 'resource_id' => 5, 'cost' => 320],
        ]);

        DB::table('resource_users')->insert([
            ['user_id' => 1, 'resource_id' => 1, 'amount' => 1000],
            ['user_id' => 1, 'resource_id' => 2, 'amount' => 1000],
            ['user_id' => 1, 'resource_id' => 3, 'amount' => 1],
            ['user_id' => 1, 'resource_id' => 4, 'amount' => 1],
            ['user_id' => 1, 'resource_id' => 5, 'amount' => 1],
        ]);
    }
}
