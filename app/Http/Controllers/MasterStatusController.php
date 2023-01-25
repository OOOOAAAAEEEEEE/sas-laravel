<?php

namespace App\Http\Controllers;

use App\Models\MasterStatus;
use App\Models\Student;
use App\Http\Requests\StoreMasterStatusRequest;
use App\Http\Requests\UpdateMasterStatusRequest;

use function Ramsey\Uuid\v1;

class MasterStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Student $student)
    {
        return view('main.master.status.index', [
            'title' => 'Master Status',
            'posts' => MasterStatus::latest()->paginate(15),
            'check' => $student->checkingAbsence(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Student $student)
    {
        return view('main.master.status.create', [
            'title' => 'Add Master Status',
            'check' => $student->checkingAbsence(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMasterStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMasterStatusRequest $request)
    {
        $validateData = $request->validate([
            'status' => 'required',
        ]);

        MasterStatus::create($validateData);

        return redirect()->intended('/master_status')->with('success', 'Your item has been added successfully!');
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
    public function edit(MasterStatus $masterStatus, Student $student)
    {
        return view('main.master.status.edit', [
            'title' => 'Edit Master Status',
            'check' => $student->checkingAbsence(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterStatusRequest  $request
     * @param  \App\Models\MasterStatus  $masterStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMasterStatusRequest $request, MasterStatus $masterStatus, $id)
    {
        $validateData = $request->validate([
            'status' => 'required',
        ]);

        $masterStatus->where('id', $id)->udpate($validateData);

        return redirect()->intended('/master_status')->with('success', 'Your item has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterStatus  $masterStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterStatus $masterStatus, $id)
    {
        $masterStatus->where('id', $id)->delete();

        return redirect()->intended('/master_status')->with('success', 'Your item has been updated successfully!');
    }
}
