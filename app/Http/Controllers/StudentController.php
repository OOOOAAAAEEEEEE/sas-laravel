<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupClasses;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\MasterStatus;

class StudentController extends Controller
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
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $validatedData = $request->validate([
            'user_id' => '',
            'master_statuses_id' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Student::create($validatedData);



        return redirect()->intended('/groupclasses')->with('success', 'Your absence has been added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student, $id, Request $request, MasterStatus $masterStatus)
    {

        $times = $request->times;
        $search = $request->search;

        // dd($search);

        return view('main.student.index', [
            'title' => 'Students Absence',
            'posts' => $student->perClass($id, $times)->paginate(15),
            'times' => $times,
            'check' => $student->checkingAbsence(),
            'statuses' => $masterStatus->all()->skip(1),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
