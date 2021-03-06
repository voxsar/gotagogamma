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
        DB::table('buildings')->insert([
            [
                'id' => 1, 'name' => 'Gota Go Home Banner', 'base' => 10, 'multiplier' => 118, 'cost_building_class' => '1', "lat" => 6.92959195756671, "lng" => 79.84256313396153, "image_url" => "images/icons/banner.png",
                'description' => '"Gota Go Home, We stand up against all corrupt politicians and government officials who support it"
                <br/>
                Banners are easy to setup, they show the message and wants of the protestors, what the objective of the GotaGoGama should be. You put any banners in the place where banner slots are available as you want and each one will generate loyalty points.
                <br/>
                Banners messages are subjective and can create feelings of disagreement, which create negative points, but banners create more positive points to offset the negative points. They build loyalty when visitors who come read the messages, and when PR photos take these messages into the media both locally and internationally
                <br/>'
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 2, 'name' => 'Forced Disappearances Banner', 'base' => 10, 'multiplier' => 118, 'cost_building_class' => '1', "lat" => 6.9294002491821045, "lng" => 79.84263555360494, "image_url" => "images/icons/banner.png",
                'description' => '"Gota is responsible for forced disappearances during the time of the war"
                <br/>
                Banners are easy to setup, they show the message and wants of the protestors, what the objective of the GotaGoGama should be. You put any banners in the place where banner slots are available as you want and each one will generate loyalty points.
                <br/>
                Banners messages are subjective and can create feelings of disagreement, which create negative points, but banners create more positive points to offset the negative points. They build loyalty when visitors who come read the messages, and when PR photos take these messages into the media both locally and internationally'
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 3, 'name' => 'Gota if you leave, you can have me!', 'base' => 10, 'multiplier' => 118, 'cost_building_class' => '1', "lat" => 6.92918723977444, "lng" => 79.84270529103932, "image_url" => "images/icons/banner.png",
                'description' => '"Hey gota if you leave the country alone, you can have me!"
                <br/>Banners are easy to setup, they show the message and wants of the protestors, what the objective of the GotaGoGama should be. You put any banners in the place where banner slots are available as you want and each one will generate loyalty points.
                <br/>
                Banners messages are subjective and can create feelings of disagreement, which create negative points, but banners create more positive points to offset the negative points. They build loyalty when visitors who come read the messages, and when PR photos take these messages into the media both locally and internationally'
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 4, 'name' => 'Robot Alien Lizard Gota', 'base' => 10, 'multiplier' => 118, 'cost_building_class' => '1', "lat" => 6.928979555509304, "lng" => 79.84277502847371, "image_url" => "images/icons/banner.png",
                'description' => '"Gota is a robot placed by lizard aliens overloards who are responsible for global warming of the planet for their invasion and to make conditions livable for them. return of the dino"
                <br/>Banners are easy to setup, they show the message and wants of the protestors, what the objective of the GotaGoGama should be. You put any banners in the place where banner slots are available as you want and each one will generate loyalty points.
                <br/>
                Banners messages are subjective and can create feelings of disagreement, which create negative points, but banners create more positive points to offset the negative points. They build loyalty when visitors who come read the messages, and when PR photos take these messages into the media both locally and internationally'
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 5, 'name' => 'Stand against bigoted division racists', 'base' => 10, 'multiplier' => 118, 'cost_building_class' => '1', "lat" => 6.928790509496121, "lng" => 79.8428447659081, "image_url" => "images/icons/banner.png",
                'description' => '"We must stand against bigoted racists, who divide our nation each time there is a crisis"
                <br/>Banners are easy to setup, they show the message and wants of the protestors, what the objective of the GotaGoGama should be. You put any banners in the place where banner slots are available as you want and each one will generate loyalty points.
                <br/>
                Banners messages are subjective and can create feelings of disagreement, which create negative points, but banners create more positive points to offset the negative points. They build loyalty when visitors who come read the messages, and when PR photos take these messages into the media both locally and internationally'
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 6, 'name' => 'Repeal 20th', 'base' => 10, 'multiplier' => 118, 'cost_building_class' => '1', "lat" => 6.928553536217606, "lng" => 79.84291182113347, "image_url" => "images/icons/banner.png",
                'description' => '"Repeal the 20th ammendment and restored the 19th ammendment, we must stop this curruption"
                <br/>Banners are easy to setup, they show the message and wants of the protestors, what the objective of the GotaGoGama should be. You put any banners in the place where banner slots are available as you want and each one will generate loyalty points.
                <br/>
                Banners messages are subjective and can create feelings of disagreement, which create negative points, but banners create more positive points to offset the negative points. They build loyalty when visitors who come read the messages, and when PR photos take these messages into the media both locally and internationally'
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 7, 'name' => 'Police and Military stop protecting the currupt', 'base' => 10, 'multiplier' => 118, 'cost_building_class' => '1', "lat" => 6.928329875935379, "lng" => 79.8429708297318, "image_url" => "images/icons/banner.png",
                'description' => '"Police and Military should functioning independantly without the influence of politicians"
                <br/>Banners are easy to setup, they show the message and wants of the protestors, what the objective of the GotaGoGama should be. You put any banners in the place where banner slots are available as you want and each one will generate loyalty points.
                <br/>
                Banners messages are subjective and can create feelings of disagreement, which create negative points, but banners create more positive points to offset the negative points. They build loyalty when visitors who come read the messages, and when PR photos take these messages into the media both locally and internationally'
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 8, 'name' => 'Gota Go Home', 'base' => 10, 'multiplier' => 118, 'cost_building_class' => '1', "lat" => 6.927597654031101, "lng" => 79.84415368390736, "image_url" => "images/icons/banner.png",
                'description' => '"Go Home Gota"
                <br/>Banners are easy to setup, they show the message and wants of the protestors, what the objective of the GotaGoGama should be. You put any banners in the place where banner slots are available as you want and each one will generate loyalty points.
                <br/>
                Banners messages are subjective and can create feelings of disagreement, which create negative points, but banners create more positive points to offset the negative points. They build loyalty when visitors who come read the messages, and when PR photos take these messages into the media both locally and internationally'
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 9, 'name' => 'Nodisena Banner', 'base' => 10, 'multiplier' => 118, 'cost_building_class' => '1', "lat" => 6.929178706489036, "lng" => 79.84408931089101, "image_url" => "images/icons/banner.png",
                'description' => '"Nodisena Go Home"
                <br/>Banners are easy to setup, they show the message and wants of the protestors, what the objective of the GotaGoGama should be. You put any banners in the place where banner slots are available as you want and each one will generate loyalty points.
                <br/>
                Banners messages are subjective and can create feelings of disagreement, which create negative points, but banners create more positive points to offset the negative points. They build loyalty when visitors who come read the messages, and when PR photos take these messages into the media both locally and internationally'
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 10, 'name' => 'Go Back to USA', 'base' => 10, 'multiplier' => 118, 'cost_building_class' => '1', "lat" => 6.929415679453313, "lng" => 79.84360651326833, "image_url" => "images/icons/banner.png",
                'description' => '"Lets unite against gota and send him home back to the USA"
                <br/>Banners are easy to setup, they show the message and wants of the protestors, what the objective of the GotaGoGama should be. You put any banners in the place where banner slots are available as you want and each one will generate loyalty points.
                <br/>
                Banners messages are subjective and can create feelings of disagreement, which create negative points, but banners create more positive points to offset the negative points. They build loyalty when visitors who come read the messages, and when PR photos take these messages into the media both locally and internationally'
            ],
        ]);


        DB::table('buildings')->insert([
            [
                'id' => 11, 'name' => 'Donation Collection Points', 'base' => 80, 'multiplier' => 600, 'cost_building_class' => '2', "lat" => 6.9287592092652375, "lng" => 79.84323279010684, "image_url" => "images/icons/donation.png",
                'description' => 'Donations help build the GotaGoGamma, anyone who wants can donate any type thing that is beneficial to the collective. These will be used to make the GotaGoGamma long term protest a sustainable long term occupancy. Donation Collection Points will generate donations every hour based on the level of production.
                <br/>
                There will always be accusations that donations are coming from foreign benefactors or people acting against the interests of Sri Lanka, these are typical propaganda organized by the pro government rumor mills'
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 12, 'name' => 'One Galle Face Restuarants 12', 'base' => 160, 'multiplier' => 620, 'cost_building_class' => '3', "lat" => 6.927704909544119, "lng" => 79.84452903270721, "image_url" => "images/icons/catering.png",
                'description' => 'Local capitalistic restaurants nearby will places that will benefit from the large crowds, while they may not show support. It is undeniable that there is mutual benefit from the large presence. If the protest is peaceful they may provide discounts that unrelated to the protest but helpful nonetheless'
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 13, 'name' => 'One Galle Face Restuarants 13', 'base' => 160, 'multiplier' => 620, 'cost_building_class' => '3', "lat" => 6.9271297818546875, "lng" => 79.84464973211288, "image_url" => "images/icons/catering.png",
                'description' => 'Mc Donalds is place for the middle upper class to stop by after protesting, while it is not perfect, we need all economic classes to unite and it is important that there are binding social objects that attract people
                <br/>Local capitalistic restaurants nearby will places that will benefit from the large crowds, while they may not show support. It is undeniable that there is mutual benefit from the large presence. If the protest is peaceful they may provide discounts that unrelated to the protest but helpful nonetheless'
            ],
        ]);


        DB::table('buildings')->insert([
            [
                'id' => 14, 'name' => 'Food Station 1', 'base' => 180, 'multiplier' => 60, 'cost_building_class' => '4', "lat" => 6.928988011949822, "lng" => 79.84311477291018, "image_url" => "images/icons/catering.png",
                'description' => 'Donated Kottu and food are avialable here'
            ],
            [
                'id' => 15, 'name' => 'Food Station 2', 'base' => 180, 'multiplier' => 60, 'cost_building_class' => '4', "lat" => 6.928601931990004, "lng" => 79.84332398521335, "image_url" => "images/icons/catering.png",
                'description' => 'Donated tents, water and other misc objects are avialable for here'
            ],
            [
                'id' => 16, 'name' => 'Maliban', 'base' => 200, 'multiplier' => 350, 'cost_building_class' => '5', "lat" => 6.928455487784597, "lng" => 79.84343932020099, "image_url" => "images/icons/catering.png",
                'description' => 'Maliban was one of the first private companies that stepped in and provided food for the people at the aragalaya, they were very open about their support'
            ],
            [
                'id' => 17, 'name' => 'University Rally Point 1', 'base' => 40, 'multiplier' => 215, 'cost_building_class' => '6', "lat" => 6.9294752710340335, "lng" => 79.84281704770953, "image_url" => "images/icons/protest.png",
                'description' => 'The interuniversity council is one of the most active youth with the most vocal platform they are also known to be violent when prevoked or ridiculed
                <br/>University are representation not the just of scholars but also the youth demographic, there has been a long since despise of the youth in Sri Lanka, typically cast aside as violent or destructive, they play a key role in protests as they have both the time, energy and passion to carry out the protests.
                In times of attacks these people are the most vulnerable and therefore will respond in kind when threatened. A saturation of the youth can also give way for the government to shutdown the protests calling it a juvenile attempt, it is important maintain a good protestor diversity'
            ],
            [
                'id' => 18, 'name' => 'University Rally Point 2', 'base' => 40, 'multiplier' => 215, 'cost_building_class' => '6', "lat" => 6.92922232239198, "lng" => 79.84290556060702, "image_url" => "images/icons/protest.png",
                'description' => 'Other university and youth will also show up but may not be part of the interuniverity council, they too share the same ideas, but are less violent when prevoked
                <br/>University are representation not the just of scholars but also the youth demographic, there has been a long since despise of the youth in Sri Lanka, typically cast aside as violent or destructive, they play a key role in protests as they have both the time, energy and passion to carry out the protests.
                In times of attacks these people are the most vulnerable and therefore will respond in kind when threatened. A saturation of the youth can also give way for the government to shutdown the protests calling it a juvenile attempt, it is important maintain a good protestor diversity'
            ],
            [
                'id' => 19, 'name' => 'Rally Point', 'base' => 260, 'multiplier' => 230, 'cost_building_class' => '7',"lat" => 6.92799195705189, "lng" => 79.84382214649541, "image_url" => "images/icons/protest.png",
                'description' => 'Every day in the evening there is a rally point where people speak about the crisis in the country
                <br/>
                People come to the forum and talk about their experiences, their fears, their disappoinments about the future. Some one will speak about the attrocities that were carried out which were always pushed under
                <br/>
                Lawyers will educate on how to recover the country and also about justic and provide a vision for the GotaGoGama legislative future'
            ],
            [
                'id' => 20, 'name' => 'Lawyers Tent', 'base' => 120, 'multiplier' => 323, 'cost_building_class' => '8', "lat" => 6.928247568977548, "lng" => 79.84375777347906, "image_url" => "images/icons/lawtent.png",
                'description' => 'There were the lawyers will stratergize, plan speeches, hold legal camps and education about all the legal curruptions carried about by the Rajapakshas and the cohorts'
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 21, 'name' => 'Tent 21', 'base' => 180, 'multiplier' => 560, 'cost_building_class' => '9', "lat" => 6.927874801539669, "lng" => 79.8432964335285, "image_url" => "images/icons/tent.png",
                'description' => '8 People sleep and participant in protests'
            ],
            [
                'id' => 22, 'name' => 'Tent 22', 'base' => 180, 'multiplier' => 560, 'cost_building_class' => '9', "lat" => 6.927757645998314, "lng" => 79.8435861121021, "image_url" => "images/icons/legal.png",
                'description' => ''
            ],
            [
                'id' => 23, 'name' => 'Tent 23', 'base' => 180, 'multiplier' => 560, 'cost_building_class' => '9', "lat" => 6.9275824237309, "lng" => 79.843352497352,  "image_url" => "images/icons/tent.png",
                'description' => ''
            ],
            [
                'id' => 24, 'name' => 'Tent 24', 'base' => 180, 'multiplier' => 560, 'cost_building_class' => '9', "lat" => 6.9273284600835, "lng" => 79.843844362434, "image_url" => "images/icons/legal.png",
                'description' => ''
            ],
            [
                'id' => 25, 'name' => 'Tent 25', 'base' => 180, 'multiplier' => 560, 'cost_building_class' => '9', "lat" => 6.928536834502743, "lng" => 79.84376851389548, "image_url" => "images/icons/tent.png",
                'description' => ''
            ],
            [
                'id' => 26, 'name' => 'Tent 26', 'base' => 180, 'multiplier' => 560, 'cost_building_class' => '9', "lat" => 6.928707242271658, "lng" => 79.8435566193833, "image_url" => "images/icons/legal.png",
                'description' => ''
            ],
        ]);


        DB::table('buildings')->insert([
            [
                'id' => 27, 'name' => 'Library', 'base' => 380, 'multiplier' => 810, 'cost_building_class' => '10', "lat" => 6.928536834502743, "lng" => 79.84360489914557, "image_url" => "images/icons/library.png",
                'description' => 'Free library books to read'
            ],
            [
                'id' => 28, 'name' => 'Red Cross', 'base' => 200, 'multiplier' => 1030, 'cost_building_class' => '11', "lat" => 6.928289210603778, "lng" => 79.84356734821937, "image_url" => "images/icons/redcross.png",
                'description' => 'Assitance, but mostly the presene of the red cross is important, as it is an intenational entity, since the 1940s after world war 2 any attack carried out on the red cross would be considered a war crime'
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 29, 'name' => 'Small Vendor', 'base' => 120, 'multiplier' => 58, 'cost_building_class' => '12', "lat" => 6.9281800430371225, "lng" => 79.8431784279122, "image_url" => "images/icons/smallvendor.png",
                'description' => ''
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 30, 'name' => 'Small Vendor', 'base' => 120, 'multiplier' => 58, 'cost_building_class' => '12', "lat" => 6.9272826167959, "lng" => 79.84348688194892, "image_url" => "images/icons/smallvendor.png",
                'description' => ''
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 31, 'name' => 'Small Vendor', 'base' => 120, 'multiplier' => 58, 'cost_building_class' => '12', "lat" => 6.9274903017732, "lng" => 79.84357807705543, "image_url" => "images/icons/smallvendor.png",
                'description' => ''
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 32, 'name' => 'Small Vendor', 'base' => 120, 'multiplier' => 58, 'cost_building_class' => '12', "lat" => 6.92887764997897, "lng" => 79.84343860218665, "image_url" => "images/icons/smallvendor.png",
                'description' => ''
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 33, 'name' => 'Small Vendor', 'base' => 120, 'multiplier' => 58, 'cost_building_class' => '12', "lat" => 6.929087996907759, "lng" => 79.84331253836295, "image_url" => "images/icons/smallvendor.png",
                'description' => ''
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 34, 'name' => 'Small Vendor', 'base' => 120, 'multiplier' => 58, 'cost_building_class' => '12', "lat" => 6.92878978351257, "lng" => 79.84382215807578, "image_url" => "images/icons/smallvendor.png",
                'description' => ''
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 35, 'name' => 'Small Vendor', 'base' => 120, 'multiplier' => 58, 'cost_building_class' => '12', "lat" => 6.929013443576649, "lng" => 79.84366658995292, "image_url" => "images/icons/smallvendor.png",
                'description' => ''
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 36, 'name' => 'Large Vendor', 'base' => 480, 'multiplier' => 23, 'cost_building_class' => '13', "lat" => 6.928874987359019, "lng" => 79.84365317890784, "image_url" => "images/icons/largevendor.png",
                'description' => ''
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 37, 'name' => 'Large Vendor', 'base' => 480, 'multiplier' => 23, 'cost_building_class' => '13', "lat" => 6.92921313997277, "lng" => 79.84358344147346, "image_url" => "images/icons/largevendor.png",
                'description' => ''
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 38, 'name' => 'Large Vendor', 'base' => 480, 'multiplier' => 23, 'cost_building_class' => '13', "lat" => 6.9292876932722915, "lng" => 79.84322134325645, "image_url" => "images/icons/largevendor.png",
                'description' => ''
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 39, 'name' => 'Large Vendor', 'base' => 480, 'multiplier' => 23, 'cost_building_class' => '13', "lat" => 6.928920251896171, "lng" => 79.84405819246909, "image_url" => "images/icons/largevendor.png",
                'description' => ''
            ],
        ]);

        DB::table('buildings')->insert([
            [
                'id' => 40, 'name' => 'Large Vendor', 'base' => 480, 'multiplier' => 23, 'cost_building_class' => '13', "lat" => 6.929173200700305, "lng" => 79.84391335318229, "image_url" => "images/icons/largevendor.png",
                'description' => ''
            ],
        ]);
    }
}
