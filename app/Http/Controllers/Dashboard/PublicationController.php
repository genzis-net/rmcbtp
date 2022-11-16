<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Reference;
use App\Models\Album;
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
                'date'=>'required|date', 
                'cover'=>'required|max:1024', 
            ]);

            if($validator->fails()){
                return response()->json([
                    'status'=>400, 
                    'errors'=>$validator->messages(),
                ]);
            }else{
                $ref = new Reference;

                if($request->has('cover')){
                    $image=$request->file('cover');
                    $reimage=time().'.'.$image->getClientOriginalExtension();
                    $dest=public_path('/images/refs/cover');
                    $image->move($dest, $reimage);
                    $ref->cover = $reimage;
                }

                $ref->title_fr=$request->input('title_fr');
                $ref->title_en=$request->input('title_en');
                $ref->date=$request->input('date');
                $ref->client=$request->input('client');
                $ref->content_en=$request->input('content_en');
                $ref->content_fr=$request->input('content_fr');
                $ref->user_id=Auth::User()->id;

                $ref->save();
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
                'edit_content_fr'=>'required', 
                'edit_content_en'=>'required', 
                'edit_client'=>'required|max:191', 
                'edit_date'=>'required|date', 
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
                    if($request->has('edit_cover')){
                        $image=$request->file('edit_cover');
                        $reimage=time().'.'.$image->getClientOriginalExtension();
                        $dest=public_path('/images/refs/cover');
                        $image->move($dest, $reimage);
                        $ref->cover = $reimage;
                    }

                    $ref->title_fr=$request->input('edit_title_fr');
                    $ref->title_en=$request->input('edit_title_en');
                    $ref->client=$request->input('edit_client');
                    $ref->date=$request->input('edit_date');
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

        public function manageAlbums()
        {
            return view('dashboard.albums.manage');
        }

        public function saveAlbum(Request $request)
        {
            
            $validator = Validator::make($request->all(), [
                'name'=>'required|max:191', 
                'image'=>'required',  
            ]);

            if($validator->fails()){
                return response()->json([
                    'status'=>400, 
                    'errors'=>$validator->messages(),
                ]);
            }else{
                $album = new Album;

                $album->name=$request->input('name');
                $album->save();

                $album_id = Album::Where('name', $album->name)->get('id');
                $album_id = $album_id[0]->id;

                if($request->has('image')){
                    $i = 0;
                    foreach($request->file('image') as $image){
                        $img = new Image;
                        $reimage=$i.time().'.'.$image->getClientOriginalExtension();
                        $dest=public_path('/images/albums/'.$album->name);
                        $image->move($dest, $reimage);
                        $img->src = $reimage;
                        $img->album_id = $album_id;
                        $img->save();
                        $i++;
                    }
                }else{
                    return response()->json(["success"=>"Une erreur s'est Produite, Reesseyez plus tard" ]);
                }
                return response()->json(["success"=>"Votre Album a bien ete programme" ]);
            }
        }
        
        public function updateAlbum(Request $request)
        {
            
            $validator = Validator::make($request->all(), [
                'image'=>'required',  
            ]);

            if($validator->fails()){
                return response()->json([
                    'status'=>400, 
                    'errors'=>$validator->messages(),
                ]);
            }else{
                $album = Album::Where('id', $request->album_id)->get();
                if(isset($album)){
                    $album =$album[0];
                    if($request->has('image')){
                        $i = 0;
                        foreach($request->file('image') as $image){
                            $img = new Image;
                            $reimage=$i.time().'.'.$image->getClientOriginalExtension();
                            $dest=public_path('/images/albums/'.$album->name);
                            $image->move($dest, $reimage);
                            $img->src = $reimage;
                            $img->album_id = $request->album_id;
                            $img->save();
                            $i++;
                        }
                    }else{
                        return response()->json(["success"=>"Une erreur s'est Produite, Reesseyez plus tard" ]);
                    }
                    return response()->json(["success"=>"Votre Album a bien ete programme" ]);
                }

                //$album_id = Album::Where('name', $album->name)->get('id');
                //$album_id = $album_id[0]->id;

                
            }
        }

        public function fetchAlbums()
        {
            $albums = Album::OrderBy('id', 'DESC')->get();
            return response()->json(array(
                'success' => true,
                'albums'   => $albums,
            )); 
        }

        public function showAlbum(){
            $album = Album::Where('id', $_GET['album'])->get();
            $album = $album[0];
            return view('dashboard.albums.show', compact('album'));
        }

        public function destroyAlbum(Testimoni $test)
        {
            $album = Album::where('id', $_GET['album'])->firstorfail();
            if($album){
                $album->delete();
                return response()->json([
                    'status'=> 200, 
                    'message'=> 'Album Deleted',
                ]);
            }else{
                return response()->json([
                    'status'=> 404, 
                    'message'=> 'Requested data does not exist',
                ]);
            }
        }

        public function destroyImage(Image $test)
        {
            $image = Image::where('id', $_GET['image'])->firstorfail();
            if($image){
                $image->delete();
                return response()->json([
                    'status'=> 200, 
                    'message'=> 'Image Deleted',
                ]);
            }else{
                return response()->json([
                    'status'=> 404, 
                    'message'=> 'Requested data does not exist',
                ]);
            }
        }
    /* END ALBUM MANAGEMENT */
}
