<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['achievements'] = Achievement::orderBy('id', 'desc')->get();
        return view('dashboard.refs.show-refs', $data);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, $ref)
    {
        $data['achievement'] = Achievement::find($ref);
        return view('dashboard.refs.edit-ref', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lang , $ref)
    {
        $ref = Achievement::find($ref);

        if($request->has('cover')){
            $ref->cover = $request['cover']->store('achievements');

        }

        $ref->title_fr=$request->input('title_fr');
        $ref->title_en=$request->input('title_en');
        $ref->date=$request->input('date');
        $ref->client=$request->input('client');
        $ref->content_en=$request->input('content_en');
        $ref->content_fr=$request->input('content_fr');
        $ref->user_id=Auth::User()->id;
        $ref->save();

        return redirect()->route('refs.index', app()->getLocale())->with('success', 'Achievement has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
