<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dentist;
use Illuminate\Http\Request;

class DentistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dentists = Dentist::all();
        return response()->json($dentists);
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

        $dentist = new Dentist();

        $dentist->name = $request->get('name');
        $dentist->email = $request->get('email');
        $dentist->cpf = $request->get('cpf');
        $dentist->phone = $request->get('phone');

        $dentist->save();

        return response()->json($dentist);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dentist = Dentist::findOrFail($id);
        return response()->json($dentist);
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
        $dentist = Dentist::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'cpf' => 'required|string',
            'phone' => 'required|string',
        ]);

        $dentist->name = $request->get('name');
        $dentist->email = $request->get('email');
        $dentist->cpf = $request->get('cpf');
        $dentist->phone = $request->get('phone');

        $dentist->save();

        return response()->json($dentist);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dentist = Dentist::findOrFail($id);
        $dentist->delete();

        return response()->json($dentist::all());
    }
}
