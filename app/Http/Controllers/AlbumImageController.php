<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlbumImageRequest;
use App\Http\Requests\UpdateAlbumImageRequest;
use App\Models\AlbumImage;

class AlbumImageController extends Controller
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
     * @param  \App\Http\Requests\StoreAlbumImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlbumImageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlbumImage  $albumImage
     * @return \Illuminate\Http\Response
     */
    public function show(AlbumImage $albumImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlbumImage  $albumImage
     * @return \Illuminate\Http\Response
     */
    public function edit(AlbumImage $albumImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlbumImageRequest  $request
     * @param  \App\Models\AlbumImage  $albumImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlbumImageRequest $request, AlbumImage $albumImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlbumImage  $albumImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlbumImage $albumImage)
    {
        //
    }
}
