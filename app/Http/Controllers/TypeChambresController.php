<?php

namespace App\Http\Controllers;

use App\Models\TypeChambres;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class TypeChambresController extends Controller
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
            'data' => TypeChambres::all()
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
        $data = $request->only('libelle');

        $validation = Validation::make($data,[
            'libelle' => 'require|string'
        ]);

        if($validation->fail()){
            return response()->json(['error' => $validation->message()],200);
        }

        $types = TypesChambres::create([
            'libelle' => $request->lebelle
        ]);

        return response()->json([
            'status' => true,
            'data' => $types
        ],Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeChambres  $typeChambres
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try {
            $types = TypesChambres::find($id)->get();
            return response()->json([
                'status' => false,
                'data' => $types
            ],Response::HTTP_OK);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'messages' => 'Types de chambres non trouver'
            ],Response::HTTP_OK);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeChambres  $typeChambres
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeChambres $typeChambres)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeChambres  $typeChambres
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeChambres $typeChambres)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeChambres  $typeChambres
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeChambres $typeChambres)
    {
        //
    }
}
