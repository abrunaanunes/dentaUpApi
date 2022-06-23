<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    protected $model = Appointment::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $appointment = $this->model::with(['client', 'dentist'])->get();
            return response()->json([
                'status' => 200,
                'data' => $appointment,
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
            'appointment_date' => 'required|string',
            'appointment_reason' => 'required|string',
            'client_id' => 'required|integer',
            'dentist_id' => 'required|integer',
        ]);

        try {
            $appointment = new $this->model();
            
            $appointment->appointment_date = $request->get('appointment_date');
            $appointment->appointment_reason = $request->get('appointment_reason');
            $appointment->client_id = $request->get('client_id');
            $appointment->dentist_id = $request->get('dentist_id');
            $appointment->user_id = auth()->id();
            
            $appointment->save();
            
            return response()->json([
                'status' => 200,
                'data' => $appointment,
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
            $appointment = $this->model::with(['client', 'dentist'])->findOrFail($id);
            return response()->json([
                'status' => 200,
                'data' => $appointment,
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
            'appointment_date' => 'required|string',
            'appointment_reason' => 'required|string',
            'client_id' => 'required|integer',
            'dentist_id' => 'required|integer',
        ]);
        
        try {
            $appointment = $this->model::findOrFail($id);
            $appointment->appointment_date = $request->get('appointment_date');
            $appointment->appointment_reason = $request->get('appointment_reason');
            $appointment->client_id = $request->get('client_id');
            $appointment->dentist_id = $request->get('dentist_id');
            $appointment->user_id = auth()->id();
    
            $appointment->save();
    
            return response()->json([
                'status' => 200,
                'data' => $appointment,
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
            $appointment = $this->model::findOrFail($id);
            $appointment->delete();

            $appointments = $this->model::all();
    
            return response()->json([
                'status' => 200,
                'data' => $appointments,
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
