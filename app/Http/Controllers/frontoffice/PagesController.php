<?php

namespace App\Http\Controllers\frontoffice;
use App\Models\ContactEmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reference;

class PagesController extends Controller
{
    public function contact()
    {
        return view('pages.contact');
    }

    public function storeContact(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|max:191', 
            'email'=>'required|max:191', 
            'phone'=>'required|max:191', 
            'subject'=>'required|max:191', 
            'message'=>'required', 
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400, 
                'errors'=>$validator->messages(),
            ]);
        }else{
            $data = request()->validate([
                'name'=>'required|max:191', 
                'email'=>'required|max:191', 
                'phone'=>'required|max:191', 
                'subject'=>'required|max:191', 
                'message'=>'required', 
            ]);

        $newEmail = new ContactEmail;
        $newEmail->name = $request->input('name');
        $newEmail->email = $request->input('email');
        $newEmail->phone = $request->input('phone');
        $newEmail->subject = $request->input('subject');
        $newEmail->message = $request->input('message');
        $newEmail->save();

        Mail::to('contact@rmcbtpsarl.com')->send(new ContactFormMail($data));
        //\App::setLocale('fr');
        return response()->json(["success"=>"Thanks for your interest. You should receive an answer shortly"]);
        }
    }

    public function about(){
        return view('pages.about');
    }

    public function projects(){
        $refs=Reference::OrderBy('updated_at', 'DESC')->paginate(12);
        return view('pages.projects', compact('refs'));
    }

    public function readproject(Reference $project){
        $ref=Reference::Where('id', $_GET['ref'])->get();
        $ref=$ref[0];
        return view('pages.readproject', compact('ref'));
    }
}
