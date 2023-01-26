<?php

namespace App\Http\Controllers;

use App\Models\MasterClasses;
use App\Models\MasterStatus;
use App\Models\Student;
use App\Models\GroupClasses;
use App\Http\Requests\StoreMasterClassesRequest;
use App\Http\Requests\UpdateMasterClassesRequest;

class MasterClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Student $student, MasterStatus $masterStatus)
    {
        return view('main.master.class.index', [
            'title' => 'Master Classes',
            'posts' => MasterClasses::select()->paginate(15),
            'check' => $student->checkingAbsence(),
            'statuses' => $masterStatus->all()->skip(1),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Student $student, MasterStatus $masterStatus)
    {
        return view('main.master.class.create', [
            'title' => 'Add Master Class',
            'check' => $student->checkingAbsence(),
            'statuses' => $masterStatus->all()->skip(1),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMasterClassesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMasterClassesRequest $request)
    {
        $validatedData = $request->validate([
            'class' => 'required',
        ]);

        MasterClasses::create($validatedData);

        $classID = MasterClasses::latest()->first();

        GroupClasses::create([
            'master_classes_id' => $classID->id,
        ]);

        return redirect()->intended('/master_class')->with('success', 'Your data has been create successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterClasses  $masterClasses
     * @return \Illuminate\Http\Response
     */
    public function show(MasterClasses $masterClasses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterClasses  $masterClasses
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterClasses $masterClasses, Student $student, MasterStatus $masterStatus)
    {
        return view('main.master.class.edit', [
            'title' => 'Is there something wrong in here?',
            'post' => $masterClasses->all(),
            'check' => $student->checkingAbsence(),
            'statuses' => $masterStatus->all()->skip(1),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterClassesRequest  $request
     * @param  \App\Models\MasterClasses  $masterClasses
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMasterClassesRequest $request, MasterClasses $masterClasses, $id)
    {
        $validatedData = $request->validate([
            'class' => 'required',
        ]);

        $masterClasses->where('id', $id)->update($validatedData);

        return redirect()->intended('/master_classes')->with('success', 'Your classes has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterClasses  $masterClasses
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterClasses $masterClasses, $id)
    {
        $masterClasses->where('id', $id)->delete();

        return redirect()->intended('/master_classes')->with('success', 'Your post has been deleted');
    }
}
