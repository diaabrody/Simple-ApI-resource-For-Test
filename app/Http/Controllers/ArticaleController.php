<?php

namespace App\Http\Controllers;

use App\Articale;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\Articale as ArticaleResource ;
use Psy\Util\Json;

class ArticaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articalses=Articale::paginate(15);

        return ArticaleResource::collection($articalses);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $articale_id =$request->input('articale_id');
       $title=$request->input('title');
       $body=$request->input('body');
       $articale=Articale::create([
           'id' => $articale_id ,
           'title' => $title ,
           'body' =>  $body
       ]);
       if($articale)
       {
           return new ArticaleResource($articale);
       }
       else
       {
           return response()->json(["error"=>"Cannot save this articale"]);

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
       $articale=Articale::where('id' , $id)->first();
       if($articale)
       {
           return new ArticaleResource($articale);

       }
       else
       {
           return response()->json(["error"=>"Now Articale Found "]);
       }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $title=$request->input('title');
        $body=$request->input('body');
        $articale=Articale::where("id" , $id)->first();
        $articale->title=$title;
        $articale->body=$body;



        if($articale->save())
        {
            return new ArticaleResource($articale);

        }

        else
        {
            return response()->json(["error"=>"Cannot update this articale"]);

        }



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
      $articale=Articale::where('id' , $id)->first();
      if($articale->delete())
      {
          return new ArticaleResource($articale);

      }



    }
}
