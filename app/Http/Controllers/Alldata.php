<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Alldata extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $client = client::all();


       return response()->json($client, 200);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client  = client::create($request->all());

        return response()->json($client, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function GetById($id)
    {
        $client = client::find($id);

            if(!$client)
            {
                return response()->json(['messge'=>'client not found !'], 404); 
            }
           
           return response()->json($client, 200);   
   
       //    
           
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editnyId($id)
    {
        
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

        $client = client::find($id);
        
        if($client)
        {
            $client->name = $request->input("name");
            $client->city = $request->input("city");
            $client->country = $request->input("country");
            $client->save();
            return response()->json($client, 200);

        }
         return response()->json(["massage"=>'client not found!'], 404);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteById($id)
    {
       $client = client::find($id);
       
       if($client)
       {
           $client->delete();
           
           return response()->json(["massage"=>'client has been deleted !'], 200);
        }

         return response()->json(["massage"=>'client not found!'], 404);
    }
}
