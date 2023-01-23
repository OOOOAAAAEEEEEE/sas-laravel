<?php

namespace App\Http\Controllers;

use App\Models\MasterClasses;
use App\Http\Requests\StoreMasterClassesRequest;
use App\Http\Requests\UpdateMasterClassesRequest;

class MasterClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main.master.class.index', [
            'title' => 'Master Classes',
            'posts' => MasterClasses::latest()->paginate(15),
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
     * @param  \App\Http\Requests\StoreMasterClassesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMasterClassesRequest $request)
    {
        //
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
    public function edit(MasterClasses $masterClasses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterClassesRequest  $request
     * @param  \App\Models\MasterClasses  $masterClasses
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMasterClassesRequest $request, MasterClasses $masterClasses)
    {
        //
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
