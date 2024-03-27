<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Models\Faq;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['faqs'] = Faq::orderBy('id', 'desc')->get();
        return view('dashboard.faqs.show-faqs', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.faqs.create-faq');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFaqRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFaqRequest $request)
    {
        $faq_id = $request->faq_id;

        $faq   =   Faq::updateOrCreate(['id' => $faq_id],
            [

                'question' => [
                    'en' => $request->question_en,
                    'fr' => $request->question_fr,
                ],
                'answer' => [
                    'en' => $request->answer_en,
                    'fr' => $request->answer_fr,
                ],

                'added_by' => Auth::user()->id,

            ]);

        return redirect()->route('faqs.index', app()->getLocale())->with('success', 'FAQ has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show($lang, Faq $faq)
    {
        $data['faq'] = $faq;
        return view('dashboard.faqs.show-faq',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, Faq $faq)
    {
        $data['faq'] = $faq;
        return view('dashboard.faqs.edit-faq',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFaqRequest  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFaqRequest $request, $lang,  Faq $faq)
    {
        $faq_id = $faq->id;

        $faq   =   Faq::updateOrCreate(['id' => $faq_id],
            [

                'question' => [
                    'en' => $request->question_en,
                    'fr' => $request->question_fr,
                ],
                'answer' => [
                    'en' => $request->answer_en,
                    'fr' => $request->answer_fr,
                ],


            ]);

        return redirect()->route('faqs.index', app()->getLocale())->with('success', 'FAQ has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        //
    }
}
