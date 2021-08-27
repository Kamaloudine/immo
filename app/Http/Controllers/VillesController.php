<?php

namespace App\Http\Controllers;

use App\Models\Villes;
use App\Models\Pays;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class VillesController extends Controller
{

    protected $user;
 
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'data' => Villes::all()
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
        $data = $request->only('libelle','pays_id');

        $validation = Validation::make($data,[
            'libelle' => 'require|string',
            'pays_id' => 'require'
        ]);

        if($validation->fail()){
            return response()->json(['error' => $validation->message()],200);
        }

        try {
            $pays = Pays::find($requestè->pays_id)->get();
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'messages' => 'pays non trouver'
            ],Response::HTTP_OK);
        }

        $villes = $pays->villes()->create([
            'libelle' => $request->lebelle
        ]);

        return response()->json([
            'status' => true,
            'data' => $villes
        ],Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Villes  $villes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        try {
            $villes = Villes::find($id)->get();
            return response()->json([
                'status' => false,
                'data' => $villes
            ],Response::HTTP_OK);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'messages' => 'pays non trouver'
            ],Response::HTTP_OK);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Villes  $villes
     * @return \Illuminate\Http\Response
     */
    public function edit(Villes $villes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Villes  $villes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Villes $villes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Villes  $villes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Villes $villes)
    {
        //
    }
}
