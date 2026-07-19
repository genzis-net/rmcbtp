<?php

namespace App\Http\Controllers\Frontoffice;
use App\Models\ContactEmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Reference;

class PagesController extends Controller
{
    public function contact()
    {
        return view('pages.contact');
    }

    public function storeContact(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email:rfc,dns|max:191',
            'phone' => 'required|string|max:191',
            'subject' => 'required|string|max:191',
            'message' => 'required|string|max:5000',
        ]);

        ContactEmail::create($data);

        Mail::to(config('contact.email'))->send(new ContactFormMail($data));

        return response()->json([
            'success' => __('Thanks for your interest. You should receive an answer shortly'),
        ], 200);
    }

    public function about(){
        $refs=Reference::OrderBy('updated_at', 'DESC')->paginate(12);
        return view('pages.about', compact('refs'));
    }

    public function simsdecor(){
        $featured = Product::active()
            ->catalog(Product::CATALOG_SIMS_DECOR)
            ->featured()
            ->with(['images' => fn ($q) => $q->orderBy('id')])
            ->latest()
            ->take(8)
            ->get();

        $products = Product::active()
            ->catalog(Product::CATALOG_SIMS_DECOR)
            ->with(['images' => fn ($q) => $q->orderBy('id')])
            ->orderByDesc('is_featured')
            ->latest()
            ->take(12)
            ->get();

        if ($featured->isEmpty()) {
            $featured = $products->take(8);
        }

        return view('pages.simsdecor', [
            'featured' => $featured,
            'products' => $products,
            'catalog' => Product::CATALOG_SIMS_DECOR,
        ]);
    }

    public function quincaillerie(){
        $featured = Product::active()
            ->catalog(Product::CATALOG_QUINCAILLERIE)
            ->featured()
            ->with(['images' => fn ($q) => $q->orderBy('id')])
            ->latest()
            ->take(8)
            ->get();

        $products = Product::active()
            ->catalog(Product::CATALOG_QUINCAILLERIE)
            ->with(['images' => fn ($q) => $q->orderBy('id')])
            ->orderByDesc('is_featured')
            ->latest()
            ->take(12)
            ->get();

        if ($featured->isEmpty()) {
            $featured = $products->take(8);
        }

        return view('pages.quincaillerie', [
            'featured' => $featured,
            'products' => $products,
            'catalog' => Product::CATALOG_QUINCAILLERIE,
        ]);
    }

    public function architecture(){
        return view('pages.architecture');
    }

    public function consulting(){
        return view('pages.consulting');
    }

    public function renovation(){
        $refs=Reference::Where('project_type', 'Renovation')->OrderBy('updated_at', 'DESC')->paginate(8);
        return view('pages.renovation', compact('refs'));
    }

    public function construction(){
        $refs=Reference::Where('project_type', 'Construction')->OrderBy('updated_at', 'DESC')->paginate(8);
        return view('pages.construction', compact('refs'));
    }



    public function projects(){
        $refs=Reference::OrderBy('updated_at', 'DESC')->paginate(12);
        return view('pages.projects', compact('refs'));
    }

    public function readproject(Reference $project)
    {
        $project->load('images');

        return view('pages.readproject', ['ref' => $project]);
    }

    public function newsletter(){
        return view('emails.newsletter.list-campaigns');
    }

    public function viewCampaign(){
        return view('emails.newsletter.view-campaign');
    }
}
