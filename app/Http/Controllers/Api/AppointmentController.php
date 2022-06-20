<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::all();
        return response()->json($appointments);
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
            'appointment_date' => 'required|datetime',
            'appointment_reason' => 'required|string',
            'client_id' => 'required|integer|exists:client.id',
            'dentist_id' => 'required|integer|exists:dentist.id',
        ]);

        $appointment = new Appointment();

        $appointment->appointment_date = $request->get('appointment_date');
        $appointment->appointment_reason = $request->get('appointment_reason');
        $appointment->client_id = $request->get('client_id');
        $appointment->dentist_id = $request->get('dentist_id');

        $appointment->save();

        return response()->json($appointment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);
        return response()->json($appointment);
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
        $appointment = Appointment::findOrFail($id);

        $request->validate([
            'appointment_date' => 'required|datetime',
            'appointment_reason' => 'required|string',
            'client_id' => 'required|integer|exists:client.id',
            'dentist_id' => 'required|integer|exists:dentist.id',
        ]);

        $appointment->appointment_date = $request->get('appointment_date');
        $appointment->appointment_reason = $request->get('appointment_reason');
        $appointment->client_id = $request->get('client_id');
        $appointment->dentist_id = $request->get('dentist_id');

        $appointment->save();

        return response()->json($appointment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return response()->json($appointment::all());
    }
}
