<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnemyRequest;
use App\Http\Requests\UpdateEnemyRequest;
use App\Models\Enemy;

class EnemyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEnemyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEnemyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enemy  $enemy
     * @return \Illuminate\Http\Response
     */
    public function show(Enemy $enemy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enemy  $enemy
     * @return \Illuminate\Http\Response
     */
    public function edit(Enemy $enemy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEnemyRequest  $request
     * @param  \App\Models\Enemy  $enemy
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEnemyRequest $request, Enemy $enemy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enemy  $enemy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enemy $enemy)
    {
        //
    }
}
