<?php

namespace App\Http\Controllers;

use App\Jobs\UpgradeBuilding;
use App\Models\BuildingUser;
use App\Models\Building;
use App\Models\Resource;
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
        );
        return view("buildings.show", $data);
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
        );
        return view("buildings.myindex", $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myshow(Building $building)
    {
        //
        $data = array(
            'resources' => Resource::all(),
            'buildings' => Building::all(),
            'building' => $building,
        );
        return view("buildings.show", $data);
    }

    /**
     * Upgrade a building of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upgrade(Building $building){
        $existingBuilding = BuildingUser::where('building_id', $building->id)->where('user_id', auth()->user()->id)->first();
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

        if($user->is_upgrading == 1){
            return back()->with([
                "message" => "Currently upgrading, try again in ".$user->upgrade_completetime,
                "type" => "warning"
            ]);
        }

        if($building->requirements->count() == 0){
            $cleared_upgrade = true;
        }else{
            foreach ($requirements as $key => $requirement) {
                foreach ($buildings as $key => $mybuilding) {
                    # code...
                    if($mybuilding->id == $requirement->id && $requirement->level == $mybuilding->level){
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
                        $user->upgrade_completetime = now()->addSeconds($building->base * $level);
                        $user->save();
                        UpgradeBuilding::dispatch($building, $user, $level)
                            ->delay($user->upgrade_completetime);
                    }
                }
            }
            return back()->with("message", "Upgrade has begun ".$user->upgrade_completetime);
        }else{
            return back()->with([
                "message" => "Not able to upgrade",
                "type" => "danger",
            ]);
        }

    }
}
