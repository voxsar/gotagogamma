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
            ['id' => 1, 'name' => 'Banner Points', 'base' => 145, 'multiplier' => 325],
            ['id' => 2, 'name' => 'Donation Collection Points', 'base' => 402, 'multiplier' => 600],
            ['id' => 3, 'name' => 'One Galle Face Restuarants', 'base' => 3545, 'multiplier' => 620],
            ['id' => 4, 'name' => 'Food Station', 'base' => 1020, 'multiplier' => 60],
            ['id' => 5, 'name' => 'Maliban', 'base' => 1610, 'multiplier' => 350],
            ['id' => 6, 'name' => 'University Rally Point', 'base' => 624, 'multiplier' => 215],
            ['id' => 7, 'name' => 'Rally Point', 'base' => 1632, 'multiplier' => 230],
            ['id' => 8, 'name' => 'Lawyers Tent', 'base' => 1715, 'multiplier' => 323],
            ['id' => 9, 'name' => 'Tents', 'base' => 4020, 'multiplier' => 560],
            ['id' => 10, 'name' => 'Library', 'base' => 3534, 'multiplier' => 810],
            ['id' => 11, 'name' => 'Red Cross', 'base' => 6860, 'multiplier' => 1030],
            ['id' => 12, 'name' => 'Small Vendors', 'base' => 415, 'multiplier' => 58],
            ['id' => 13, 'name' => 'Large Vendors', 'base' => 7015, 'multiplier' => 23],
            ['id' => 14, 'name' => 'Uganda', 'base' => 7015, 'multiplier' => 23],
        ]);

        DB::table('resources')->insert([
            ['id' => 1, 'name' => 'Food', 'base' => 5310, 'multiplier' => 410],
            ['id' => 2, 'name' => 'Donations', 'base' => 1404, 'multiplier' => 170],
            ['id' => 3, 'name' => 'Postive Points', 'base' => 2410, 'multiplier' => 364],
            ['id' => 4, 'name' => 'Negative Points', 'base' => 2410, 'multiplier' => 364],
            ['id' => 5, 'name' => 'Loyalty', 'base' => 1404, 'multiplier' => 170],
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
            ['building_id' => 1, 'resource_id' => 4, 'cost' => -2],
            ['building_id' => 1, 'resource_id' => 5, 'cost' => 20],
        ]);

        DB::table('building_costs')->insert([
            ['building_id' => 2, 'resource_id' => 1, 'cost' => -140],
            ['building_id' => 2, 'resource_id' => 2, 'cost' => -160],
            ['building_id' => 2, 'resource_id' => 3, 'cost' => 8],
            ['building_id' => 2, 'resource_id' => 4, 'cost' => -3],
            ['building_id' => 2, 'resource_id' => 5, 'cost' => 78],
        ]);

        DB::table('building_costs')->insert([
            ['building_id' => 3, 'resource_id' => 1, 'cost' => -780],
            ['building_id' => 3, 'resource_id' => 2, 'cost' => -460],
            ['building_id' => 3, 'resource_id' => 3, 'cost' => 0],
            ['building_id' => 3, 'resource_id' => 4, 'cost' => -30],
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

        DB::table('resource_users')->insert([
            ['user_id' => 1, 'resource_id' => 1, 'amount' => 1000],
            ['user_id' => 1, 'resource_id' => 2, 'amount' => 1000],
            ['user_id' => 1, 'resource_id' => 3, 'amount' => 1000],
            ['user_id' => 1, 'resource_id' => 4, 'amount' => 1000],
            ['user_id' => 1, 'resource_id' => 5, 'amount' => 1000],
        ]);
    }
}
