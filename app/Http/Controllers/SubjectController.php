<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject = Subject::all();

        if (request()->wantsJson())
        {
            return response()->json(['subject' => $subject], 200);
        }

        return view('subject.index',compact('subject'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject_code' => 'required',
            'subject_name' => 'required',
        ]);

        $subject = Subject::create($request->all());

        if (request()->wantsJson())
        {
            return response()->json(['subject' => $subject], 201);
        }

        return redirect()->route('subject.index')
                        ->with('success','Subject created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {

        if (request()->wantsJson())
        {
            return response()->json(['subject' => $subject], 200);
        }

        return view('subject.show',compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        return view('subject.edit',compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'subject_code' => 'required',
            'subject_name' => 'required',
        ]);

        $subject->update($request->all());

        if (request()->wantsJson())
        {
            return response()->json(['subject' => $subject], 200);
        }

        return redirect()->route('subject.index')
                        ->with('success','Subject updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        if (request()->wantsJson())
        {
            return response()->json(null, 204);
        }

        return redirect()->route('subject.index')
                        ->with('success','Subject deleted successfully');
    }
}
