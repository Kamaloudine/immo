<?php

namespace App\Http\Controllers;

use App\Models\Quartiers;
use App\Models\Villes;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class QuartiersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'data' => Quariers::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         //
         $data = $request->only('libelle','ville_id');

         $validation = Validation::make($data,[
             'libelle' => 'require|string',
             'ville_id' => 'require'
         ]);
 
         if($validation->fail()){
             return response()->json(['error' => $validation->message()],200);
         }
 
         try {
             $villes = Villes::find($requestè->ville_id)->get();
         } catch (\Exception $e) {
             return response()->json([
                 'status' => false,
                 'messages' => 'ville non trouver'
             ],Response::HTTP_OK);
         }
 
         $villes = $villes->quartiers()->create([
             'libelle' => $request->lebelle,
            ]);
 
         return response()->json([
             'status' => true,
             'data' => $villes
         ],Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quartiers  $quartiers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quartiers  $quartiers
     * @return \Illuminate\Http\Response
     */
    public function edit(Quartiers $quartiers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quartiers  $quartiers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quartiers $quartiers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quartiers  $quartiers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quartiers $quartiers)
    {
        //
    }
}
