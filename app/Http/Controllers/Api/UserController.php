<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $model = User::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $user = $this->model::all();
            return response()->json($user);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
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
            'name' => 'required|string',
            'password' => 'required|string',
            'email' => 'required|email',
        ]);

        try {
            $user = new $this->model();

            $user->name = $request->get('name');
            $user->name = $request->get('password');
            $user->name = $request->get('email');

            $user->save();

            $credentials = request()->only('email', 'password');

            if(!auth()->attempt($credentials)) abort(401, 'Credenciais inválidas');

            $token = auth()->user()->createToken('auth_token');

            return response()->json([
                'data' => [
                    'token' => $token->plainTextToken
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
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
            $user = $this->model::findOrFail($id);
            return response()->json($user);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
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
            'name' => 'required|string',
            'password' => 'required|string',
            'email' => 'required|email',
        ]);

        try {
            $user = $this->model::findOrFail($id);

            $user->name = $request->get('name');
            $user->name = $request->get('password');
            $user->name = $request->get('email');

            $user->save();

            return response()->json($user);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
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
            $user = $this->model::findOrFail($id);
            $user->delete();

            return response()->json($user::all());
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }
}
