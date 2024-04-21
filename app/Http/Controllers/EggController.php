<?php

namespace App\Http\Controllers;

use App\Models\Egg;
use App\Http\Requests\StoreEggRequest;
use App\Http\Requests\UpdateEggRequest;

class EggController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEggRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Egg $egg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Egg $egg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEggRequest $request, Egg $egg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Egg $egg)
    {
        //
    }
}
