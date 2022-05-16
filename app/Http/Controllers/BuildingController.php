<?php

namespace App\Http\Controllers;

use App\Jobs\UpgradeBuilding;
use App\Models\BuildingUser;
use App\Models\Building;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = array(
            'resources' => Resource::all(),
            'buildings' => Building::all(),
            'speed' => config('app.speed', 1),
        );
        return view("buildings.index", $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Building $building)
    {
        //
        $data = array(
            'resources' => Resource::all(),
            'buildings' => Building::all(),
            'building' => $building,
            'speed' => config('app.speed', 1),
        );
        return view("buildings.show", $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mymap()
    {
        //
        $data = array(
            'resources' => Resource::all(),
            'buildings' => auth()->user()->buildings,
            'slots' => auth()->user()->slots,
            'speed' => config('app.speed', 1),
        );
        return view("buildings.mymap", $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myindex()
    {
        //
        $data = array(
            'resources' => Resource::all(),
            'buildings' => auth()->user()->buildings,
            'slots' => auth()->user()->slots,
            'speed' => config('app.speed', 1),
        );
        return view("buildings.myindex", $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myshow(BuildingUser $buildinguser, Building $building)
    {
        //
        $data = array(
            'resources' => Resource::all(),
            'buildings' => Building::all(),
            'building' => $building,
            'buildinguser' => $buildinguser,
            'speed' => config('app.speed', 1),
        );
        return view("buildings.myshow", $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(BuildingUser $buildinguser)
    {
        //
        $speed = config('app.speed', 1);
        $buildings = auth()->user()->buildings;
        $excepts = [];
        foreach ($buildings as $b) {
            $excepts[] = $b->pivot->building_id;
        }
        $allbuildings = Building::all()->except($excepts);
        $eligiblebulldings = collect();
        foreach ($allbuildings as $allbuilding) {
            # code...

            if($allbuilding->requirements->count() == 0){
                $eligiblebulldings->push($allbuilding);
            }else{
                $requirement_fullfilled = 0;
                $requirements = $allbuilding->requirements;
                foreach ($requirements as $requirement) {
                    # code...
                    foreach ($buildings as $building) {
                        # code...
                        if($requirement->id  == $building->id && $requirement->level == $building->level){
                            $requirement_fullfilled += 1;
                        }
                    }
                }
                if($requirement_fullfilled > 0){
                    $eligiblebulldings->push($allbuilding);
                }
            }
        }
        $avialablebulldings = collect();
        foreach ($eligiblebulldings as $eligiblebullding) {
            if($eligiblebullding->requirements->count() == 0){
                $avialablebulldings->push($eligiblebullding);
            }else{
                foreach ($buildings as $building) {
                    if($eligiblebullding->id != $building->id){
                        $avialablebulldings->push($eligiblebullding);
                    }
                }
            }
        }
        $data = array(
            'resources' => Resource::all(),
            'slot' => $buildinguser->id,
            'buildings' => $eligiblebulldings,
            'speed' => $speed,
        );
        return view("buildings.create", $data);
    }

    public function make(BuildingUser $buildinguser, Building $building)
    {
        # code...
        $level = 1;
        if($buildinguser != null){
            $level = $buildinguser->level + 1;
        }
        $cleared_upgrade = false;
        $cleared_cost = true;

        $user = auth()->user();
        $buildings = auth()->user()->buildings;
        $resources = auth()->user()->resources;
        $requirements = $building->requirements;
        $speed = config('app.speed', 1);

        if($user->is_upgrading == 1){
            return redirect()->route("buildings.mymap")->with([
                "message" => "Currently upgrading, try again in ".$user->upgrade_completetime->diffForHumans(),
                "type" => "warning"
            ]);
        }

        BuildingUser::where('user_id', auth()->user()->id)->update(['is_building' => 0]);

        if($building->requirements->count() == 0){
            $cleared_upgrade = true;
        }else{
            foreach ($requirements as $key => $requirement) {
                foreach ($buildings as $key => $mybuilding) {
                    # code...
                    if($mybuilding->id == $requirement->id && $requirement->level >= $mybuilding->level){
                        $cleared_upgrade = true;
                    }
                }
            }
        }

        foreach ($building->costs as $key => $cost) {
            foreach ($resources as $key => $resource) {
                # code...
                if($cost->id == $resource->id){
                    $myresource = $resource->pivot;
                    $myresource->amount += (($cost->pivot->cost * $level) * $building->multiplier) / 100;
                    if($myresource->amount <= 0){
                        $cleared_cost = false;
                    }
                }
            }
        }

        if($cleared_cost == true && $cleared_upgrade == true){
            foreach ($building->costs as $key => $cost) {
                foreach ($resources as $key => $resource) {
                    # code...
                    if($cost->id == $resource->id){
                        $myresource = $resource->pivot;
                        $myresource->amount += (($cost->pivot->cost * $level) * $building->multiplier) / 100;
                        $myresource->save();
                        $user->is_upgrading = 1;
                        $user->upgrade_completetime = now()->addSeconds(($building->base * $level) * $speed);
                        $user->save();
                        $buildinguser->is_building = 1;
                        $buildinguser->save();
                        UpgradeBuilding::dispatch($buildinguser, $building, $level)
                            ->delay($user->upgrade_completetime);
                    }
                }
            }
            return redirect()->route("buildings.mymap")->with("message", "Upgrade will complete ".$user->upgrade_completetime->diffForHumans());
        }else{
            return redirect()->route("buildings.mymap")->with([
                "message" => "Not able to upgrade",
                "type" => "danger",
            ]);
        }
    }

    /**
     * Upgrade a building of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upgrade(BuildingUser $buildinguser, Building $building){
        $existingBuilding = $buildinguser;
        $level = 1;
        if($existingBuilding != null){
            $level = $existingBuilding->level + 1;
        }
        $cleared_upgrade = false;
        $cleared_cost = true;

        $user = auth()->user();
        $buildings = auth()->user()->buildings;
        $resources = auth()->user()->resources;
        $requirements = $building->requirements;
        $speed = config('app.speed', 1);

        if($user->is_upgrading == 1){
            return back()->with([
                "message" => "Currently upgrading, try again in ".$user->upgrade_completetime->diffForHumans(),
                "type" => "warning"
            ]);
        }

        BuildingUser::where('user_id', auth()->user()->id)->update(['is_building' => 0]);

        if($building->requirements->count() == 0){
            $cleared_upgrade = true;
        }else{
            foreach ($requirements as $key => $requirement) {
                foreach ($buildings as $key => $mybuilding) {
                    # code...
                    if($mybuilding->id == $requirement->id && $requirement->level >= $mybuilding->level){
                        $cleared_upgrade = true;
                    }
                }
            }
        }

        foreach ($building->costs as $key => $cost) {
            foreach ($resources as $key => $resource) {
                # code...
                if($cost->id == $resource->id){
                    $myresource = $resource->pivot;
                    $myresource->amount += (($cost->pivot->cost * $level) * $building->multiplier) / 100;
                    if($myresource->amount <= 0){
                        $cleared_cost = false;
                    }
                }
            }
        }

        if($cleared_cost == true && $cleared_upgrade == true){
            foreach ($building->costs as $key => $cost) {
                foreach ($resources as $key => $resource) {
                    # code...
                    if($cost->id == $resource->id){
                        $myresource = $resource->pivot;
                        $myresource->amount += (($cost->pivot->cost * $level) * $building->multiplier) / 100;
                        $myresource->save();
                        $user->is_upgrading = 1;
                        $user->upgrade_completetime = now()->addSeconds(($building->base * $level) * $speed);
                        $user->save();
                        $buildinguser->is_building = 1;
                        $buildinguser->save();
                        UpgradeBuilding::dispatch($buildinguser, $building, $level)
                            ->delay($user->upgrade_completetime);
                    }
                }
            }
            return back()->with("message", "Upgrade will complete ".$user->upgrade_completetime->diffForHumans());
        }else{
            return back()->with([
                "message" => "Not able to upgrade",
                "type" => "warning"
            ]);
        }
    }

    public function katana()
    {
        # code...
        $users = User::all();
        // $resources = Resource::all();
        foreach ($users as $user) {
            foreach ($user->buildings as $building) {
                foreach ($building->productions as $production) {
                    foreach ($user->resources as $resource) {
                        if($production->id == $resource->id){
                            $myresource = $resource->pivot;
                            $myresource->amount += (($production->pivot->produce * $building->pivot->level) * $building->multiplier) / 100;
                            $myresource->save();
                        }
                    }
                }
            }
        }
    }

    public function help()
    {
        return view("help.index");
    }
}
