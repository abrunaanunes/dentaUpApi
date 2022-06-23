<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $model = Client::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $client = $this->model::all();
            return response()->json([
                'status' => 200,
                'data' => $client,
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
            $client = new $this->model();
    
            $client->name = $request->get('name');
            $client->email = $request->get('email');
            $client->cpf = $request->get('cpf');
            $client->phone = $request->get('phone');
    
            $client->save();
    
            return response()->json([
                'status' => 200,
                'data' => $client,
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
            $client = $this->model::findOrFail($id);
            return response()->json([
                'status' => 200,
                'data' => $client,
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
            $client = Client::findOrFail($id);
            
            $client->name = $request->get('name');
            $client->email = $request->get('email');
            $client->cpf = $request->get('cpf');
            $client->phone = $request->get('phone');
    
            $client->save();
    
            return response()->json([
                'status' => 200,
                'data' => $client,
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
            $client = $this->model::findOrFail($id);
            $client->delete();
            $clients =  $this->model::all();
    
            return response()->json([
                'status' => 200,
                'data' => $clients,
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
