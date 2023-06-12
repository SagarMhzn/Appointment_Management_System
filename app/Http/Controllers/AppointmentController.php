<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Do_;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('client.appointments');
    }

    public function makeAppointment()
    {
        $docs = User::with('doctors')->where('isverified', 1)->where('role', 2)->get();
        return view('client.make-appointment', compact('docs'));
    }

    public function createAppointment(Request $request)
    {
        $appt = new Appointment();
        $client_id = auth()->user()->id;
        $appt->client_id = $client_id;
        $appt->doctor_id = $request->doc_select;
        $appt->appointment_date = $request->apptdate;
        $appt->appointment_start_time = $request->starttime;
        $appt->appointment_end_time = $request->endtime;
        $appt->description = $request->description;
        $appt->verified = 0;
        $appt->status = 0;
        $appt->save();
        return redirect()->route('client.appointments');
    }

    public function showAppointmentClient()
    {
        $appointments = Appointment::with('userAppointmentsDoctor')->with('doctorAppointments')->where('client_id', auth()->user()->id)->get();
        return view('client.appointments', compact('appointments'));
    }

    public function showAppointmentDoctor()
    {
        $appointments = Appointment::with('userAppointmentsClient')->where('doctor_id', auth()->user()->id)->where('status',0)->get();
        return view('doctor.view-appointments', compact('appointments'));
    }
    
    public function showCompletedAppointmentDoctor()
    {
        $appointments = Appointment::with('userAppointmentsClient')->where('doctor_id', auth()->user()->id)->where('status',1)->get();
        return view('doctor.completed-appointment-list', compact('appointments'));
    }
    

    public function toggleVerified($id)
    {
        $appointment = Appointment::findOrFail($id);

        if($appointment->status != 1){
            $appointment->verified = !$appointment->verified;
            $appointment->save();
        }
        return redirect()->back();
    }

    public function toggleStatus($id)
    {
        $appointment = Appointment::findOrFail($id);
        if($appointment->verified != 0){

            $appointment->status = !$appointment->status;
            $appointment->save();
        }
        return redirect()->back();
    }
}
