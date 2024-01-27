<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Architecture;
use App\Models\ArchitectureImages;

class ArchitectureController extends Controller
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
        return view('dashboard.architecture.manage');
    }

    public function fetch(){
        $refs = Architecture::OrderBy('id', 'DESC')->get();
            return response()->json(array(
                'success' => true,
                'refs'   => $refs,
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_en'=>'required|max:191', 
            'title_fr'=>'required|max:191', 
            'price'=>'required', 
            'content_fr'=>'required', 
            'content_en'=>'required', 
            'image'=>'required|max:3000', 
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400, 
                'errors'=>$validator->messages(),
            ]);
        }else{

            $ref = new Architecture;
            $ref->title = [
                    'en' => $request->input('title_en'),
                    'fr' => $request->input('title_fr'),
            ];
            //return response()->json(["success"=>"New plans uploaded" ]);

            $ref->description = [
                'en' => $request->input('content_en'),
                'fr' => $request->input('content_fr'),
            ];
            $ref->price=$request->input('price');
            $ref->save();

            //$reference = Architecture::find($ref->title_en);
            $reference_id =  $ref->id;;

            if($request->has('image')){
                $i = 0;
                foreach($request->file('image') as $image){
                    $img = new ArchitectureImages;
                    $reimage=$i.time().'.'.$image->getClientOriginalExtension();
                    $dest=public_path('/images/architecture/'.$ref->title_en);
                    $image->move($dest, $reimage);
                    $img->src = $reimage;
                    $img->architecture_id = $reference_id;
                    $img->save();
                    $i++;
                }
            }else{
                $reference->delete();
                return response()->json(["success"=>"Une erreur s'est Produite, Reesseyez plus tard" ]);
            }

            
            return response()->json(["success"=>"New plans uploaded" ]);
        }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
