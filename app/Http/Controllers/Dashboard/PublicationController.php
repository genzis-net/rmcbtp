<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Reference;
use App\Models\Image;

class PublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /* MANAGE REFERENCES */

        public function manageRefs()
        {
            return view('dashboard.refs.manage');
        }

        public function showRef(){
            $ref = Reference::Where('id', $_GET['ref'])->get();
            $ref = $ref[0];
            return view('dashboard.refs.show', compact('ref'));
        }

        public function fetchRefs()
        {
            $refs = Reference::OrderBy('id', 'DESC')->get();
            return response()->json(array(
                'success' => true,
                'refs'   => $refs,
            )); 
        }

        public function saveRef(Request $request){

            $validator = Validator::make($request->all(), [
                'title_en'=>'required|max:191', 
                'title_fr'=>'required|max:191', 
                'client'=>'required|max:191', 
                'content_fr'=>'required', 
                'content_en'=>'required', 
                'year'=>'required', 
                'image'=>'required|max:3000', 
                'project_type'=>'required', 
                'location'=>'required', 
            ]);

            if($validator->fails()){
                return response()->json([
                    'status'=>400, 
                    'errors'=>$validator->messages(),
                ]);
            }else{
                $ref = new Reference;
                $ref->title_fr=$request->input('title_fr');
                $ref->title_en=$request->input('title_en');
                $ref->year=$request->input('year');
                $ref->location=$request->input('location');
                $ref->project_type=$request->input('project_type');
                $ref->client=$request->input('client');
                $ref->content_en=$request->input('content_en');
                $ref->content_fr=$request->input('content_fr');
                $ref->user_id=Auth::User()->id;

                $ref->save();

                $reference = Reference::Where('title_en', $ref->title_en)->get();
                $reference_id = $reference[0]->id;

                if($request->has('image')){
                    $i = 0;
                    foreach($request->file('image') as $image){
                        $img = new Image;
                        $reimage=$i.time().'.'.$image->getClientOriginalExtension();
                        $dest=public_path('/images/achievements/'.$ref->title_en);
                        $image->move($dest, $reimage);
                        $img->src = $reimage;
                        $img->reference_id = $reference_id;
                        $img->save();
                        $i++;
                    }
                }else{
                    $reference->delete();
                    return response()->json(["success"=>"Une erreur s'est Produite, Reesseyez plus tard" ]);
                }

                
                return response()->json(["success"=>"Votre Realisation a bien ete prise en compte" ]);
            }
        }

        public function editRef(Reference $achievement)
        {
            $ref = Reference::Where('id', $_GET['ref'])->get();
            $ref = $ref[0];
            if($ref){
                return response()->json([
                        'status'=>200,
                        'ref'=>$ref,
                ]);
            }else{
                return response()->json([
                        'status'=>404, 
                        'message'=>'Can\'t find requested data',
                ]);
            }
        }

        public function updateRef(Request $request, Reference $achievement){
            
            $validator = Validator::make($request->all(), [
                'edit_title_en'=>'required|max:191', 
                'edit_title_fr'=>'required|max:191', 
                'edit_client'=>'required|max:191', 
                'edit_content_fr'=>'required', 
                'edit_content_en'=>'required', 
                'edit_year'=>'required', 
                'edit_image'=>'max:3000', 
                'edit_project_type'=>'required', 
                'edit_location'=>'required', 
            ]);

            if($validator->fails()){
                return response()->json([
                    'status'=>400, 
                    'errors'=>$validator->messages(),
                ]);
            }else{
                $ref = Reference::Where('id', $_GET['ref'])->get();
                
                $ref = $ref[0];

                if($ref){                    
                    
                    if($request->has('edit_image')){
                        $i = 0;
                        foreach($request->file('edit_image') as $image){
                            $img = new Image;
                            $reimage=$i.time().'.'.$image->getClientOriginalExtension();
                            $dest=public_path('/images/achievements/'.$ref->title_en);
                            $image->move($dest, $reimage);
                            $img->src = $reimage;
                            $img->reference_id = $ref->id;
                            $img->save();
                            $i++;
                        }
                    }else{
                        //$ref->delete();
                        //return response()->json(["success"=>"Une erreur s'est Produite, Reesseyez plus tard" ]);
                    }
                    
                    $ref->title_fr=$request->input('edit_title_fr');
                    $ref->title_en=$request->input('edit_title_en');
                    $ref->client=$request->input('edit_client');
                    $ref->year=$request->input('edit_year');
                    $ref->location=$request->input('edit_location');
                    $ref->project_type=$request->input('edit_project_type');
                    $ref->content_en=$request->input('edit_content_en');
                    $ref->content_fr=$request->input('edit_content_fr');
                    $ref->update();
                    
                    return response()->json(["success"=>"Mise a jour reussie" ]);

                }else{
                    return response()->json([
                        'status'=>404, 
                        'message'=>'Requested data does not exist',
                    ]);
                }
            }
        }

        public function destroyRef(Reference $achievement)
        {
            $ref = Reference::where('id', $_GET['ref'])->firstorfail();
            if($ref){
                $ref->delete();
                return response()->json([
                    'status'=> 200, 
                    'message'=> 'Reference Deleted',
                ]);
            }else{
                return response()->json([
                    'status'=> 404, 
                    'message'=> 'Requested data does not exist',
                ]);
            }
        }

        public function delRef(Reference $achievement)
        {
            $ref = Reference::where('id', $_GET['ref'])->firstorfail();
            if($ref){
                $ref->delete();
                return redirect()->route('manage-refs');
            }else{
                return response()->json([
                    'status'=> 404, 
                    'message'=> 'Article does not exist',
                ]);
            }
        }
    /* END MANAGE REFERENCE */

    /* ALBUM MANAGEMENT */

      public function destroyImage(Image $test)
        {
            $image = Image::where('id', $_GET['image'])->firstorfail();
            if($image){
                $image->delete();
                return back();
            }else{
                return response()->json([
                    'status'=> 404, 
                    'message'=> 'Requested data does not exist',
                ]);
            }
        }
    /* END ALBUM MANAGEMENT */
}
