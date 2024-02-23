<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Achievement;
use App\Models\Event;
use App\Models\Testimoni;
use App\Models\Album;
use App\Models\Image;

class PubController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageArticles()
    {
        return view('dashboard.articles.manage');
    }

    public function showArticle(){
        $article = Article::Where('id', $_GET['article'])->get();
        $article = $article[0];
        return view('dashboard.articles.show', compact('article'));
    }

    public function fetchArticles()
    {
        $articles = Article::OrderBy('id', 'DESC')->get();
        return response()->json(array(
            'success' => true,
            'articles'   => $articles,
          ));
    }

    public function saveArticle(Request $request){

        $validator = Validator::make($request->all(), [
            'title_en'=>'required|max:191',
            'title_fr'=>'required|max:191',
            'content_fr'=>'required',
            'content_en'=>'required',
            'cover'=>'required|max:1024',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $article = new Article;

            if($request->has('cover')){
                $image=$request->file('cover');
                $reimage=time().'.'.$image->getClientOriginalExtension();
                $dest=public_path('/images/articles/cover');
                $image->move($dest, $reimage);
                $article->cover = $reimage;
            }

            if($request->has('document')){
                $doc=$request->file('document');
                $redoc=time().'.'.$doc->getClientOriginalExtension();
                $dest=public_path('/images/articles/document');
                $doc->move($dest, $redoc);
                $article->document = $redoc;
            }

            $article->title_fr=$request->input('title_fr');
            $article->title_en=$request->input('title_en');
            $article->content_en=$request->input('content_en');
            $article->content_fr=$request->input('content_fr');
            $article->status=false;
            $article->user_id=Auth::User()->id;

            $article->save();
            return response()->json(["success"=>"Article a bien ete pris en compte" ]);
        }
    }

    public function editArticle($lang ,Article $article)
    {
       $article = Article::Where('id', $_GET['article'])->get();
       $article = $article[0];
       if($article){
           return response()->json([
                'status'=>200,
                'article'=>$article,
           ]);
       }else{
           return response()->json([
                'status'=>404,
                'message'=>'Can\'t find any data on this article',
           ]);
       }
    }

    public function updateArticle(Request $request,$lang , Article $article){

        $validator = Validator::make($request->all(), [
            'edit_title_en'=>'required|max:191',
            'edit_title_fr'=>'required|max:191',
            'edit_content_fr'=>'required',
            'edit_content_en'=>'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $article = Article::Where('id', $_GET['article'])->get();

            $article = $article[0];

            if($article){
                if($request->has('edit_cover')){
                    $image=$request->file('edit_cover');
                    $reimage=time().'.'.$image->getClientOriginalExtension();
                    $dest=public_path('/images/articles/cover');
                    $image->move($dest, $reimage);
                    $article->cover = $reimage;
                }

                $article->title_fr=$request->input('edit_title_fr');
                $article->title_en=$request->input('edit_title_en');
                $article->content_en=$request->input('edit_content_en');
                $article->content_fr=$request->input('edit_content_fr');
                $article->update();
                return response()->json(["success"=>"Mise a jour reussie" ]);

            }else{
                return response()->json([
                     'status'=>404,
                     'message'=>'Article does not exist',
                ]);
            }
        }
    }

    public function destroyArticle($lang ,Article $article)
    {
        $article = Article::where('id', $_GET['article'])->firstorfail();
        if($article){
            $article->delete();
            return response()->json([
                'status'=> 200,
                'message'=> 'Article Deleted',
            ]);
        }else{
            return response()->json([
                'status'=> 404,
                'message'=> 'Article does not exist',
            ]);
        }
    }

    public function delArticle($lang ,Article $article)
    {
        $article = Article::where('id', $_GET['article'])->firstorfail();
        if($article){
            $article->delete();
            return redirect()->route('manage-articles');
        }else{
            return response()->json([
                'status'=> 404,
                'message'=> 'Article does not exist',
            ]);
        }
    }






/* MANAGE REFERENCES */

    public function manageRefs()
    {
        return view('dashboard.refs.manage');
    }

    public function showRef(){
        $ref = Achievement::Where('id', $_GET['ref'])->get();
        $ref = $ref[0];
        return view('dashboard.refs.show', compact('ref'));
    }

    public function fetchRefs()
    {
        $refs = Achievement::OrderBy('id', 'DESC')->get();
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
            $ref = new Achievement;

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
            return response()->json(["success"=>"Votre Realisation a bien ete prise en compte" ]);
        }
    }

    public function editRef($lang ,Achievement $achievement)
    {
       $ref = Achievement::Where('id', $_GET['ref'])->get();
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

    public function updateRef(Request $request,$lang , Achievement $achievement){

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
            $ref = Achievement::Where('id', $_GET['ref'])->get();

            $ref = $ref[0];

            if($ref){
                if($request->has('edit_cover')){
                    $ref->cover = $request['edit_cover']->store('achievements');
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

    public function destroyRef($lang ,Achievement $achievement)
    {
        $ref = Achievement::where('id', $_GET['ref'])->firstorfail();
        if($ref){
            $ref->delete();
            return response()->json([
                'status'=> 200,
                'message'=> 'Achievement Deleted',
            ]);
        }else{
            return response()->json([
                'status'=> 404,
                'message'=> 'Requested data does not exist',
            ]);
        }
    }

    public function delRef($lang ,Achievement $achievement)
    {
        $ref = Achievement::where('id', $_GET['ref'])->firstorfail();
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






    public function manageEvents()
    {
        return view('dashboard.events.manage');
    }

    public function fetchEvents()
    {
        $events = Event::OrderBy('id', 'DESC')->get();
        return response()->json(array(
            'success' => true,
            'events'   => $events,
          ));
    }

    public function showEvent(){
        $event = Event::Where('id', $_GET['event'])->get();
        $event = $event[0];
        return view('dashboard.events.show', compact('event'));
    }


    public function saveEvent(Request $request){

        $today= date('m/d/Y');
        $validator = Validator::make($request->all(), [
            'title_en'=>'required|max:191',
            'title_fr'=>'required|max:191',
            'location'=>'required|max:191',
            'content_fr'=>'required',
            'content_en'=>'required',
            'date'=>'required|date|after_or_equal:'.$today,
            'time'=>'required|date_format:H:i',
            'cover'=>'required|max:1024',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $event = new Event;

            if($request->has('cover')){
                $image=$request->file('cover');
                $reimage=time().'.'.$image->getClientOriginalExtension();
                $dest=public_path('/images/events/cover');
                $image->move($dest, $reimage);
                $event->cover = $reimage;
            }

            $event->title_fr=$request->input('title_fr');
            $event->title_en=$request->input('title_en');
            $event->date=$request->input('date');
            $event->time=$request->input('time');
            $event->location=$request->input('location');
            $event->content_en=$request->input('content_en');
            $event->content_fr=$request->input('content_fr');
            $event->user_id=Auth::User()->id;
            $event->status='pending';

            $event->save();

            return response()->json(["success"=>"Votre Evenement a bien ete programme" ]);
        }
    }

    public function editEvent($lang ,Event $event)
    {
       $event = Event::Where('id', $_GET['event'])->get();
       $event = $event[0];
       if($event){
           return response()->json([
                'status'=>200,
                'event'=>$event,
           ]);
       }else{
           return response()->json([
                'status'=>404,
                'message'=>'Can\'t find requested data',
           ]);
       }
    }

    public function updateEvent(Request $request,$lang , Event $event){

        $validator = Validator::make($request->all(), [
            'edit_title_en'=>'required|max:191',
            'edit_title_fr'=>'required|max:191',
            'edit_content_fr'=>'required',
            'edit_content_en'=>'required',
            'edit_location'=>'required|max:191',
            'edit_date'=>'required',
            'edit_time'=>'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $event = Event::Where('id', $_GET['event'])->get();

            $event = $event[0];

            if($event){
                if($request->has('edit_cover')){
                    $image=$request->file('edit_cover');
                    $reimage=time().'.'.$image->getClientOriginalExtension();
                    $dest=public_path('/images/events/cover');
                    $image->move($dest, $reimage);
                    $event->cover = $reimage;
                }

                $event->title_fr=$request->input('edit_title_fr');
                $event->title_en=$request->input('edit_title_en');
                $event->location=$request->input('edit_location');
                $event->date=$request->input('edit_date');
                $event->time=$request->input('edit_time');
                $event->content_en=$request->input('edit_content_en');
                $event->content_fr=$request->input('edit_content_fr');
                $event->update();
                return response()->json(["success"=>"Mise a jour reussie" ]);

            }else{
                return response()->json([
                     'status'=>404,
                     'message'=>'Requested data does not exist',
                ]);
            }
        }
    }

    public function destroyEvent($lang ,Event $event)
    {
        $event = Event::where('id', $_GET['event'])->firstorfail();
        if($event){
            $event->delete();
            return response()->json([
                'status'=> 200,
                'message'=> 'Event Deleted',
            ]);
        }else{
            return response()->json([
                'status'=> 404,
                'message'=> 'Requested data does not exist',
            ]);
        }
    }

    public function delEvent($lang ,Event $event)
    {
        $event = Event::where('id', $_GET['event'])->firstorfail();
        if($event){
            $event->delete();
            return redirect()->route('manage-events');
        }else{
            return response()->json([
                'status'=> 404,
                'message'=> 'Event does not exist',
            ]);
        }
    }









    public function manageTestimonies()
    {
        return view('dashboard.testimonies.manage');
    }

    public function fetchTestimonies()
    {
        $tests = Testimoni::OrderBy('id', 'DESC')->get();
        return response()->json(array(
            'success' => true,
            'tests'   => $tests,
          ));
    }

    public function saveTestimony(Request $request){

        $validator = Validator::make($request->all(), [
            'client'=>'required|max:191',
            'content_fr'=>'required',
            'content_en'=>'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $test = new Testimoni;

            $test->client=$request->input('client');
            $test->content_en=$request->input('content_en');
            $test->content_fr=$request->input('content_fr');

            $test->save();

            return response()->json(["success"=>"Votre Temoignage a bien ete programme" ]);
        }
    }

    public function editTestimony($lang ,Testimoni $test)
    {
       $test = Testimoni::Where('id', $_GET['test'])->get();
       //$test = $test[0];
       if(isset($test[0])){
            $test = $test[0];
           return response()->json([
                'status'=>200,
                'test'=>$test,
           ]);
       }else{
           return response()->json([
                'status'=>404,
                'message'=>'Can\'t find requested data',
           ]);
       }
    }

    public function updateTestimony(Request $request,$lang , Testimoni $test){

        $validator = Validator::make($request->all(), [
            'edit_client'=>'required|max:191',
            'edit_content_fr'=>'required',
            'edit_content_en'=>'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $test = Testimoni::Where('id', $_GET['test'])->get();

            $test = $test[0];

            if($test){

                $test->client=$request->input('edit_client');
                $test->content_en=$request->input('edit_content_en');
                $test->content_fr=$request->input('edit_content_fr');
                $test->update();
                return response()->json(["success"=>"Mise a jour reussie" ]);

            }else{
                return response()->json([
                     'status'=>404,
                     'message'=>'Requested data does not exist',
                ]);
            }
        }
    }

    public function destroyTestimony($lang ,Testimoni $test)
    {
        $test = Testimoni::where('id', $_GET['test'])->firstorfail();
        if($test){
            $test->delete();
            return response()->json([
                'status'=> 200,
                'message'=> 'testimony Deleted',
            ]);
        }else{
            return response()->json([
                'status'=> 404,
                'message'=> 'Requested data does not exist',
            ]);
        }
    }



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

    public function destroyAlbum($lang ,Testimoni $test)
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

    public function destroyImage($lang ,Image $test)
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
