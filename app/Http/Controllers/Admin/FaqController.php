<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::latest()->paginate(15);

        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'question_en' => 'required|string|max:500',
            'question_fr' => 'required|string|max:500',
            'answer_en' => 'required|string',
            'answer_fr' => 'required|string',
        ]);

        Faq::create([
            'question' => [
                'en' => $data['question_en'],
                'fr' => $data['question_fr'],
            ],
            'answer' => [
                'en' => $data['answer_en'],
                'fr' => $data['answer_fr'],
            ],
            'added_by' => auth()->id(),
        ]);

        return redirect()
            ->route('admin.faqs.index', ['language' => app()->getLocale()])
            ->with('success', 'FAQ created successfully.');
    }

    public function show(Faq $faq)
    {
        return view('admin.faqs.show', compact('faq'));
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $data = $request->validate([
            'question_en' => 'required|string|max:500',
            'question_fr' => 'required|string|max:500',
            'answer_en' => 'required|string',
            'answer_fr' => 'required|string',
        ]);

        $faq->update([
            'question' => [
                'en' => $data['question_en'],
                'fr' => $data['question_fr'],
            ],
            'answer' => [
                'en' => $data['answer_en'],
                'fr' => $data['answer_fr'],
            ],
        ]);

        return redirect()
            ->route('admin.faqs.index', ['language' => app()->getLocale()])
            ->with('success', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()
            ->route('admin.faqs.index', ['language' => app()->getLocale()])
            ->with('success', 'FAQ deleted successfully.');
    }
}
