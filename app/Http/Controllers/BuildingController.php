<?php

namespace App\Http\Controllers;

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
}
