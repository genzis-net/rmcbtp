<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHerosectionRequest;
use App\Http\Requests\UpdateHerosectionRequest;
use App\Models\Herosection;
use Illuminate\Support\Facades\Storage;

class HerosectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['heros'] = Herosection::orderBy('id', 'desc')->get();
        return view('dashboard.heros.show-heros', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.heros.create-hero');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHerosectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHerosectionRequest $request)
    {
        $hero_id = $request->hero_id;

        $hero   =   Herosection::updateOrCreate(['id' => $hero_id],
            [

                'heading_title' => [
                    'en' => $request->heading_title_en,
                    'fr' => $request->heading_title_fr,
                ],
                'heading_description' => [
                    'en' => $request->heading_description_en,
                    'fr' => $request->heading_description_fr,
                ],
                'heading_btn' => [
                    'en' => $request->heading_btn_en,
                    'fr' => $request->heading_btn_fr,
                ],
                'heading_link' => $request->heading_link,
                'status' => $request->status == "true",


            ]);

        if($hero->status){
            foreach (Herosection::orderBy('id', 'desc')->where([['status',true],['id','<>',$hero->id]])->get() as $herosection){
                $herosection->status = false;
                $herosection->save();
            }
        }

        if ($request->heading_product_image) {
            $fileName = time() . '_img.' . $request->heading_product_image->extension();
            if ($hero->heading_product_image)
                Storage::delete($hero->heading_product_image);
            $request->heading_product_image->move(public_path('storage/heros/' . $hero->id . '/images/'), $fileName);
            $hero->heading_product_image = 'storage/heros/' . $hero->id . '/images/' . $fileName;
            $hero->save();
        }

        if ($request->heading_bg_image) {
            $fileName = time() . '_img.' . $request->heading_bg_image->extension();
            if ($hero->heading_bg_image)
                Storage::delete($hero->heading_bg_image);
            $request->heading_bg_image->move(public_path('storage/heros/' . $hero->id . '/images/'), $fileName);
            $hero->heading_bg_image = 'storage/heros/' . $hero->id . '/images/' . $fileName;
            $hero->save();
        }

        return redirect()->route('heros.index', app()->getLocale())->with('success', 'hero has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Herosection  $herosection
     * @return \Illuminate\Http\Response
     */
    public function show($lang, Herosection $hero)
    {
        $data['hero'] = $hero;
        return view('dashboard.heros.show-hero', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Herosection  $herosection
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, Herosection $hero)
    {
        $data['hero'] = $hero;
        return view('dashboard.heros.edit-hero', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHerosectionRequest  $request
     * @param   $lang
     * @param  \App\Models\Herosection  $hero
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHerosectionRequest $request, $lang, Herosection $hero)
    {
        $hero_id = $hero->id;

        $hero   =   Herosection::updateOrCreate(['id' => $hero_id],
            [

                'heading_title' => [
                    'en' => $request->heading_title_en,
                    'fr' => $request->heading_title_fr,
                ],
                'heading_description' => [
                    'en' => $request->heading_description_en,
                    'fr' => $request->heading_description_fr,
                ],
                'heading_btn' => [
                    'en' => $request->heading_btn_en,
                    'fr' => $request->heading_btn_fr,
                ],
                'heading_link' => $request->heading_link,
                'status' => $request->status == "true",


            ]);

        if($hero->status){
            foreach (Herosection::orderBy('id', 'desc')->where([['status',true],['id','<>',$hero->id]])->get() as $herosection){
                $herosection->status = false;
                $herosection->save();
            }
        }

        if ($request->heading_product_image) {
            $fileName = time() . '_img.' . $request->heading_product_image->extension();
            if ($hero->heading_product_image)
                Storage::delete($hero->heading_product_image);
            $request->heading_product_image->move(public_path('storage/heros/' . $hero->id . '/images/'), $fileName);
            $hero->heading_product_image = 'storage/heros/' . $hero->id . '/images/' . $fileName;
            $hero->save();
        }

        if ($request->heading_bg_image) {
            $fileName = time() . '_img.' . $request->heading_bg_image->extension();
            if ($hero->heading_bg_image)
                Storage::delete($hero->heading_bg_image);
            $request->heading_bg_image->move(public_path('storage/heros/' . $hero->id . '/images/'), $fileName);
            $hero->heading_bg_image = 'storage/heros/' . $hero->id . '/images/' . $fileName;
            $hero->save();
        }

        return redirect()->route('heros.index', app()->getLocale())->with('success', 'hero has been added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Herosection  $herosection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Herosection $herosection)
    {
        //
    }
}
