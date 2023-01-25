<?php

namespace App\Http\Controllers;

use App\Models\GroupClasses;
use App\Models\Student;
use App\Models\MasterStatus;
use App\Http\Requests\StoreGroupClassesRequest;
use App\Http\Requests\UpdateGroupClassesRequest;

class GroupClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GroupClasses $groupClasses, Student $student, MasterStatus $masterStatus)
    {
        return view('main.groupclasses.index', [
            'title' => 'Group Classes',
            'posts' => $groupClasses->JoinMasterKelas()->paginate(15),
            'check' => $student->checkingAbsence(),
            'statuses' => $masterStatus->all()->skip(1),
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
     * @param  \App\Http\Requests\StoreGroupClassesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupClassesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroupClasses  $groupClasses
     * @return \Illuminate\Http\Response
     */
    public function show(GroupClasses $groupClasses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroupClasses  $groupClasses
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupClasses $groupClasses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupClassesRequest  $request
     * @param  \App\Models\GroupClasses  $groupClasses
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupClassesRequest $request, GroupClasses $groupClasses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroupClasses  $groupClasses
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupClasses $groupClasses)
    {
        //
    }
}
