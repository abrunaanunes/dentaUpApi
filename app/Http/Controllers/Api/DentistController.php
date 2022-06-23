<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dentist;
use Illuminate\Http\Request;

class DentistController extends Controller
{
    protected $model = Dentist::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $dentist = $this->model::all();
            return response()->json([
                'status' => 200,
                'data' => $dentist,
                'error' => 'false'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 404,
                'data' => [],
                'error' => $th->getMessage()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'cpf' => 'required|string',
            'phone' => 'required|string',
        ]);

        try {
            $dentist = new $this->model();
    
            $dentist->name = $request->get('name');
            $dentist->email = $request->get('email');
            $dentist->cpf = $request->get('cpf');
            $dentist->phone = $request->get('phone');
    
            $dentist->save();
    
            return response()->json([
                'status' => 200,
                'data' => $dentist,
                'error' => 'false'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 404,
                'data' => [],
                'error' => $th->getMessage()
            ]);
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
        try {
            $dentist = $this->model::findOrFail($id);
            return response()->json([
                'status' => 200,
                'data' => $dentist,
                'error' => 'false'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 404,
                'data' => [],
                'error' => $th->getMessage()
            ]);
        }
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
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'cpf' => 'required|string',
            'phone' => 'required|string',
        ]);
        
        try {
            $dentist = $this->model::findOrFail($id);
    
            $dentist->name = $request->get('name');
            $dentist->email = $request->get('email');
            $dentist->cpf = $request->get('cpf');
            $dentist->phone = $request->get('phone');
    
            $dentist->save();
    
            return response()->json([
                'status' => 200,
                'data' => $dentist,
                'error' => 'false'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 404,
                'data' => [],
                'error' => $th->getMessage()
            ]);
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
        try {
            $dentist = $this->model::findOrFail($id);
            $dentist->delete();

            $dentists = $this->model::all();
    
            return response()->json([
                'status' => 200,
                'data' => $dentists,
                'error' => 'false'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 404,
                'data' => [],
                'error' => $th->getMessage()
            ]);
        }
    }
}
