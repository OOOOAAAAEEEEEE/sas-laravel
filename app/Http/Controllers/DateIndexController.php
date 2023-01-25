<?php

namespace App\Http\Controllers;

use App\Models\DateIndex;
use App\Models\GroupClasses;
use App\Http\Requests\StoreDateIndexRequest;
use App\Http\Requests\UpdateDateIndexRequest;


class DateIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DateIndex $dateIndex)
    {
        return view('main.dashboard.index', [
            'title' => 'Index',
            'posts' => $dateIndex->latest()->paginate(15),
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
     * @param  \App\Http\Requests\StoreDateIndexRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDateIndexRequest $request)
    {
        $validatedData = $request->validate([
            'created_at' => '',
            'updated_at' => '',
        ]);

        DateIndex::create($validatedData);

        return redirect()->intended('/dashboard')->with('success', 'Your post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DateIndex  $dateIndex
     * @return \Illuminate\Http\Response
     */
    public function show(GroupClasses $groupClasses)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DateIndex  $dateIndex
     * @return \Illuminate\Http\Response
     */
    public function edit(DateIndex $dateIndex)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDateIndexRequest  $request
     * @param  \App\Models\DateIndex  $dateIndex
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDateIndexRequest $request, DateIndex $dateIndex)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DateIndex  $dateIndex
     * @return \Illuminate\Http\Response
     */
    public function destroy(DateIndex $dateIndex, $id)
    {
        $dateIndex->where('id', $id)->delete();

        return redirect()->intended('/dashboard')->with('success', 'Your post has been deleted');
    }
}
