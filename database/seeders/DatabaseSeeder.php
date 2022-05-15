<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\Building;

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

        $this->call([
            BuildingSeeder::class,
        ]);

        DB::table('resources')->insert([
            ['id' => 1, 'name' => 'Food', 'description' => 'Food is the great unitor of any cause, since the time of the cave people, people have gather around to break bread with their friends, setting aside differences. The more food you have for your protestors the more energetic they will be to stand up to curruption'],
            ['id' => 2, 'name' => 'Donations', 'description' => 'Donations are done by anyone, all struggles are build with resources provided by the collective. It is important that these donations are not politizied, a non violent peaceful protest that is non partisian grows resources slow due to this reason'],
            ['id' => 3, 'name' => 'Postive Points', 'description' => 'All eyes are on the protest, every action taken will be interpreted as postive or negative in terms of PR, and protest depends on the pressure they put on government officials, the pressure and momentum they have is built by the postive PR and relations they have with the public and people they represent'],
            ['id' => 4, 'name' => 'Negative Points', 'description' => 'Pro Government has more power to paint false narratives, but all false narratives are built around nugets of truth either misinterpreted or manupuliated, protestors must be smart not allow their actions to leave the door wide open for mis interpretations, but unfortunately every action is up for critisim, protestors must learn not allow themselves to be baited'],
            ['id' => 5, 'name' => 'Loyalty', 'description' => 'When the collective actually starts to serving their purpose, or taking a step in the right direction, it build loyalty by the protestors'],
        ]);

        for ($id=1; $id <= 10; $id++) {
            DB::table('building_costs')->insert([
                ['building_id' => $id, 'resource_id' => 1, 'cost' => -320],
                ['building_id' => $id, 'resource_id' => 2, 'cost' => -240],
                ['building_id' => $id, 'resource_id' => 3, 'cost' => 4],
                ['building_id' => $id, 'resource_id' => 4, 'cost' => 2],
                ['building_id' => $id, 'resource_id' => 5, 'cost' => 20],
            ]);

            DB::table('building_productions')->insert([
                ['building_id' => $id, 'resource_id' => 1, 'produce' => 0],
                ['building_id' => $id, 'resource_id' => 2, 'produce' => 240],
                ['building_id' => $id, 'resource_id' => 3, 'produce' => 2],
                ['building_id' => $id, 'resource_id' => 4, 'produce' => 1],
                ['building_id' => $id, 'resource_id' => 5, 'produce' => 1],
            ]);
        }

        DB::table('building_costs')->insert([
            ['building_id' => 11, 'resource_id' => 1, 'cost' => -140],
            ['building_id' => 11, 'resource_id' => 2, 'cost' => -160],
            ['building_id' => 11, 'resource_id' => 3, 'cost' => 8],
            ['building_id' => 11, 'resource_id' => 4, 'cost' => 3],
            ['building_id' => 11, 'resource_id' => 5, 'cost' => 78],
        ]);

        DB::table('building_productions')->insert([
            ['building_id' => 11, 'resource_id' => 1, 'produce' => -10],
            ['building_id' => 11, 'resource_id' => 2, 'produce' => 580],
            ['building_id' => 11, 'resource_id' => 3, 'produce' => 10],
            ['building_id' => 11, 'resource_id' => 4, 'produce' => 5],
            ['building_id' => 11, 'resource_id' => 5, 'produce' => 10],
        ]);

        DB::table('building_requirements')->insert([
            ['building_id' => 11, 'cost_building_class' => 1, 'level' => 2],
        ]);

        for ($id=12; $id <= 13; $id++) {
            DB::table('building_costs')->insert([
                ['building_id' => $id, 'resource_id' => 1, 'cost' => -780],
                ['building_id' => $id, 'resource_id' => 2, 'cost' => -460],
                ['building_id' => $id, 'resource_id' => 3, 'cost' => 0],
                ['building_id' => $id, 'resource_id' => 4, 'cost' => 30],
                ['building_id' => $id, 'resource_id' => 5, 'cost' => -20],
            ]);

            DB::table('building_productions')->insert([
                ['building_id' => $id, 'resource_id' => 1, 'produce' => 360],
                ['building_id' => $id, 'resource_id' => 2, 'produce' => 0],
                ['building_id' => $id, 'resource_id' => 3, 'produce' => 0],
                ['building_id' => $id, 'resource_id' => 4, 'produce' => 8],
                ['building_id' => $id, 'resource_id' => 5, 'produce' => 0],
            ]);
        }

        DB::table('building_requirements')->insert([
            ['building_id' => 12, 'cost_building_class' => 2, 'level' => 2],
            ['building_id' => 13, 'cost_building_class' => 2, 'level' => 2],
        ]);

        DB::table('building_costs')->insert([
            ['building_id' => 14, 'resource_id' => 1, 'cost' => -380],
            ['building_id' => 14, 'resource_id' => 2, 'cost' => -260],
            ['building_id' => 14, 'resource_id' => 3, 'cost' => 70],
            ['building_id' => 14, 'resource_id' => 4, 'cost' => 0],
            ['building_id' => 14, 'resource_id' => 5, 'cost' => 40],
            ['building_id' => 15, 'resource_id' => 1, 'cost' => -412],
            ['building_id' => 15, 'resource_id' => 2, 'cost' => -512],
            ['building_id' => 15, 'resource_id' => 3, 'cost' => 90],
            ['building_id' => 15, 'resource_id' => 4, 'cost' => 30],
            ['building_id' => 15, 'resource_id' => 5, 'cost' => 100],
        ]);
        DB::table('building_productions')->insert([
            ['building_id' => 14, 'resource_id' => 1, 'produce' => 610],
            ['building_id' => 14, 'resource_id' => 2, 'produce' => 50],
            ['building_id' => 14, 'resource_id' => 3, 'produce' => 25],
            ['building_id' => 14, 'resource_id' => 4, 'produce' => 5],
            ['building_id' => 14, 'resource_id' => 5, 'produce' => 45],
            ['building_id' => 15, 'resource_id' => 1, 'produce' => 610],
            ['building_id' => 15, 'resource_id' => 2, 'produce' => 50],
            ['building_id' => 15, 'resource_id' => 3, 'produce' => 25],
            ['building_id' => 15, 'resource_id' => 4, 'produce' => 5],
            ['building_id' => 15, 'resource_id' => 5, 'produce' => 45],
        ]);

        DB::table('building_requirements')->insert([
            ['building_id' => 14, 'cost_building_class' => 2, 'level' => 2],
            ['building_id' => 15, 'cost_building_class' => 2, 'level' => 2],
        ]);

        DB::table('building_costs')->insert([
            ['building_id' => 16, 'resource_id' => 1, 'cost' => -352],
            ['building_id' => 16, 'resource_id' => 2, 'cost' => -262],
            ['building_id' => 16, 'resource_id' => 3, 'cost' => 90],
            ['building_id' => 16, 'resource_id' => 4, 'cost' => 90],
            ['building_id' => 16, 'resource_id' => 5, 'cost' => 100],
        ]);
        DB::table('building_productions')->insert([
            ['building_id' => 16, 'resource_id' => 1, 'produce' => 890],
            ['building_id' => 16, 'resource_id' => 2, 'produce' => 180],
            ['building_id' => 16, 'resource_id' => 3, 'produce' => 10],
            ['building_id' => 16, 'resource_id' => 4, 'produce' => 5],
            ['building_id' => 16, 'resource_id' => 5, 'produce' => 15],
        ]);

        DB::table('building_requirements')->insert([
            ['building_id' => 16, 'cost_building_class' => 3, 'level' => 2],
            ['building_id' => 16, 'cost_building_class' => 4, 'level' => 2],
        ]);

        DB::table('building_costs')->insert([
            ['building_id' => 17, 'resource_id' => 1, 'cost' => -450],
            ['building_id' => 17, 'resource_id' => 2, 'cost' => -862],
            ['building_id' => 17, 'resource_id' => 3, 'cost' => 190],
            ['building_id' => 17, 'resource_id' => 4, 'cost' => 30],
            ['building_id' => 17, 'resource_id' => 5, 'cost' => 200],
            ['building_id' => 18, 'resource_id' => 1, 'cost' => -654],
            ['building_id' => 18, 'resource_id' => 2, 'cost' => -1320],
            ['building_id' => 18, 'resource_id' => 3, 'cost' => 300],
            ['building_id' => 18, 'resource_id' => 4, 'cost' => 70],
            ['building_id' => 18, 'resource_id' => 5, 'cost' => 170],
        ]);
        DB::table('building_productions')->insert([
            ['building_id' => 17, 'resource_id' => 1, 'produce' => -60],
            ['building_id' => 17, 'resource_id' => 2, 'produce' => 0],
            ['building_id' => 17, 'resource_id' => 3, 'produce' => 300],
            ['building_id' => 17, 'resource_id' => 4, 'produce' => 50],
            ['building_id' => 17, 'resource_id' => 5, 'produce' => 105],
            ['building_id' => 18, 'resource_id' => 1, 'produce' => -60],
            ['building_id' => 18, 'resource_id' => 2, 'produce' => 0],
            ['building_id' => 18, 'resource_id' => 3, 'produce' => 300],
            ['building_id' => 18, 'resource_id' => 4, 'produce' => 50],
            ['building_id' => 18, 'resource_id' => 5, 'produce' => 105],
        ]);

        DB::table('building_requirements')->insert([
            ['building_id' => 17, 'cost_building_class' => 1, 'level' => 2],
            ['building_id' => 18, 'cost_building_class' => 1, 'level' => 2],
        ]);

        DB::table('building_costs')->insert([
            ['building_id' => 19, 'resource_id' => 1, 'cost' => -650],
            ['building_id' => 19, 'resource_id' => 2, 'cost' => -380],
            ['building_id' => 19, 'resource_id' => 3, 'cost' => 160],
            ['building_id' => 19, 'resource_id' => 4, 'cost' => 60],
            ['building_id' => 19, 'resource_id' => 5, 'cost' => 150],
        ]);
        DB::table('building_productions')->insert([
            ['building_id' => 19, 'resource_id' => 1, 'produce' => 0],
            ['building_id' => 19, 'resource_id' => 2, 'produce' => 70],
            ['building_id' => 19, 'resource_id' => 3, 'produce' => 100],
            ['building_id' => 19, 'resource_id' => 4, 'produce' => 50],
            ['building_id' => 19, 'resource_id' => 5, 'produce' => 205],
        ]);

        DB::table('building_costs')->insert([
            ['building_id' => 20, 'resource_id' => 1, 'cost' => -1790],
            ['building_id' => 20, 'resource_id' => 2, 'cost' => -3650],
            ['building_id' => 20, 'resource_id' => 3, 'cost' => 430],
            ['building_id' => 20, 'resource_id' => 4, 'cost' => 20],
            ['building_id' => 20, 'resource_id' => 5, 'cost' => 250],
        ]);
        DB::table('building_productions')->insert([
            ['building_id' => 20, 'resource_id' => 1, 'produce' => 0],
            ['building_id' => 20, 'resource_id' => 2, 'produce' => 70],
            ['building_id' => 20, 'resource_id' => 3, 'produce' => 100],
            ['building_id' => 20, 'resource_id' => 4, 'produce' => 50],
            ['building_id' => 20, 'resource_id' => 5, 'produce' => 205],
        ]);

        DB::table('building_requirements')->insert([
            ['building_id' => 19, 'cost_building_class' => 2, 'level' => 2],
            ['building_id' => 19, 'cost_building_class' => 6, 'level' => 2],
            ['building_id' => 20, 'cost_building_class' => 6, 'level' => 2],
        ]);

        for ($id=21; $id <= 26; $id++) {
            DB::table('building_costs')->insert([
                ['building_id' => $id, 'resource_id' => 1, 'cost' => -1280],
                ['building_id' => $id, 'resource_id' => 2, 'cost' => -2310],
                ['building_id' => $id, 'resource_id' => 3, 'cost' => 250],
                ['building_id' => $id, 'resource_id' => 4, 'cost' => 0],
                ['building_id' => $id, 'resource_id' => 5, 'cost' => 270],
            ]);
            DB::table('building_productions')->insert([
                ['building_id' => $id, 'resource_id' => 1, 'produce' => -10],
                ['building_id' => $id, 'resource_id' => 2, 'produce' => -10],
                ['building_id' => $id, 'resource_id' => 3, 'produce' => 150],
                ['building_id' => $id, 'resource_id' => 4, 'produce' => 30],
                ['building_id' => $id, 'resource_id' => 5, 'produce' => 600],
            ]);

            DB::table('building_requirements')->insert([
                ['building_id' => $id, 'cost_building_class' => 4, 'level' => 2],
                ['building_id' => $id, 'cost_building_class' => 7, 'level' => 2],
                ['building_id' => $id, 'cost_building_class' => 8, 'level' => 2],
            ]);
        }

        DB::table('building_costs')->insert([
            ['building_id' => 27, 'resource_id' => 1, 'cost' => -1790],
            ['building_id' => 27, 'resource_id' => 2, 'cost' => -3650],
            ['building_id' => 27, 'resource_id' => 3, 'cost' => 430],
            ['building_id' => 27, 'resource_id' => 4, 'cost' => 20],
            ['building_id' => 27, 'resource_id' => 5, 'cost' => 250],
        ]);
        DB::table('building_productions')->insert([
            ['building_id' => 27, 'resource_id' => 1, 'produce' => -10],
            ['building_id' => 27, 'resource_id' => 2, 'produce' => 700],
            ['building_id' => 27, 'resource_id' => 3, 'produce' => 700],
            ['building_id' => 27, 'resource_id' => 4, 'produce' => 200],
            ['building_id' => 27, 'resource_id' => 5, 'produce' => 380],
        ]);

        DB::table('building_requirements')->insert([
            ['building_id' => 27, 'cost_building_class' => 8, 'level' => 2],
            ['building_id' => 27, 'cost_building_class' => 12, 'level' => 2],
        ]);

        DB::table('building_costs')->insert([
            ['building_id' => 28, 'resource_id' => 1, 'cost' => -1790],
            ['building_id' => 28, 'resource_id' => 2, 'cost' => -3650],
            ['building_id' => 28, 'resource_id' => 3, 'cost' => 430],
            ['building_id' => 28, 'resource_id' => 4, 'cost' => 20],
            ['building_id' => 28, 'resource_id' => 5, 'cost' => 250],
        ]);
        DB::table('building_productions')->insert([
            ['building_id' => 28, 'resource_id' => 1, 'produce' => -10],
            ['building_id' => 28, 'resource_id' => 2, 'produce' => 700],
            ['building_id' => 28, 'resource_id' => 3, 'produce' => 500],
            ['building_id' => 28, 'resource_id' => 4, 'produce' => 20],
            ['building_id' => 28, 'resource_id' => 5, 'produce' => 480],
        ]);

        DB::table('building_requirements')->insert([
            ['building_id' => 28, 'cost_building_class' => 9, 'level' => 2],
        ]);

        for ($id=29; $id <= 35; $id++) {
            DB::table('building_costs')->insert([
                ['building_id' => $id, 'resource_id' => 1, 'cost' => -1400],
                ['building_id' => $id, 'resource_id' => 2, 'cost' => -900],
                ['building_id' => $id, 'resource_id' => 3, 'cost' => 390],
                ['building_id' => $id, 'resource_id' => 4, 'cost' => 50],
                ['building_id' => $id, 'resource_id' => 5, 'cost' => 270],
            ]);
            DB::table('building_productions')->insert([
                ['building_id' => $id, 'resource_id' => 1, 'produce' => 600],
                ['building_id' => $id, 'resource_id' => 2, 'produce' => 200],
                ['building_id' => $id, 'resource_id' => 3, 'produce' => 25],
                ['building_id' => $id, 'resource_id' => 4, 'produce' => 10],
                ['building_id' => $id, 'resource_id' => 5, 'produce' => 190],
            ]);

            DB::table('building_requirements')->insert([
                ['building_id' => $id, 'cost_building_class' => 1, 'level' => 2],
            ]);
        }

        for ($id=36; $id <= 40; $id++) {
            DB::table('building_costs')->insert([
                ['building_id' => $id, 'resource_id' => 1, 'cost' => -2750],
                ['building_id' => $id, 'resource_id' => 2, 'cost' => -1862],
                ['building_id' => $id, 'resource_id' => 3, 'cost' => 790],
                ['building_id' => $id, 'resource_id' => 4, 'cost' => 200],
                ['building_id' => $id, 'resource_id' => 5, 'cost' => 320],
            ]);
            DB::table('building_productions')->insert([
                ['building_id' => $id, 'resource_id' => 1, 'produce' => 1000],
                ['building_id' => $id, 'resource_id' => 2, 'produce' => 500],
                ['building_id' => $id, 'resource_id' => 3, 'produce' => 50],
                ['building_id' => $id, 'resource_id' => 4, 'produce' => 20],
                ['building_id' => $id, 'resource_id' => 5, 'produce' => 390],
            ]);

            DB::table('building_requirements')->insert([
                ['building_id' => $id, 'cost_building_class' => 13, 'level' => 2],
            ]);
        }

        DB::table('resource_users')->insert([
            ['user_id' => 1, 'resource_id' => 1, 'amount' => 10000],
            ['user_id' => 1, 'resource_id' => 2, 'amount' => 10000],
            ['user_id' => 1, 'resource_id' => 3, 'amount' => 1],
            ['user_id' => 1, 'resource_id' => 4, 'amount' => 1],
            ['user_id' => 1, 'resource_id' => 5, 'amount' => 1],
        ]);

        $buildings = Building::all();
        foreach ($buildings as $building) {
            # code...
            DB::table('building_users')->insert([
                ['user_id' => 1, 'level' => 0, "lat" => $building->lat, "lng" => $building->lng],
            ]);
        }
    }
}
