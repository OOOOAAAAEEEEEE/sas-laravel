<?php

namespace App\Http\Controllers;

use App\Models\MasterStatus;
use App\Http\Requests\StoreMasterStatusRequest;
use App\Http\Requests\UpdateMasterStatusRequest;

class MasterStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main.master.status.index', [
            'title' => 'Master Status',
            'posts' => MasterStatus::latest()->paginate(15),
        ]);
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
     * @param  \App\Http\Requests\StoreMasterStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMasterStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterStatus  $masterStatus
     * @return \Illuminate\Http\Response
     */
    public function show(MasterStatus $masterStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterStatus  $masterStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterStatus $masterStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterStatusRequest  $request
     * @param  \App\Models\MasterStatus  $masterStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMasterStatusRequest $request, MasterStatus $masterStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterStatus  $masterStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterStatus $masterStatus)
    {
        //
    }
}
