<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
        $appt->appointment_date_bs = $request->date_bs;
        $appt->appointment_date_ad = $request->date_ad;
        $appt->appointment_start_time = $request->starttime;
        $appt->appointment_end_time = $request->endtime;
        $appt->description = $request->description;
        $appt->verified = 0;
        $appt->status = 0;
        $appt->save();
        return redirect()->route('client.appointments')->with('create_success', 'Appoinment Book!');
    }

    public function showAppointmentClient()
    {
        $appointments = Appointment::with('userAppointmentsDoctor')->with('doctorAppointments')->where('client_id', auth()->user()->id)->get();
        $apptCount = Appointment::where('client_id', Auth::user()->id)->count();
        return view('client.appointments', compact('appointments', 'apptCount'));
    }

    public function showAppointmentDoctor()
    {
        $appointments = Appointment::with('userAppointmentsClient')->where('doctor_id', auth()->user()->id)->where('status', 0)->get();
        return view('doctor.view-appointments', compact('appointments'));
    }

    public function showCompletedAppointmentDoctor()
    {
        $appointments = Appointment::with('userAppointmentsClient')->where('doctor_id', auth()->user()->id)->where('status', 1)->get();
        return view('doctor.completed-appointment-list', compact('appointments'));
    }


    public function toggleVerified($id)
    {
        $appointment = Appointment::findOrFail($id);

        if ($appointment->status != 1) {
            if ($appointment->verified == 0) {
                $appointment->verified = !$appointment->verified;
                $appointment->save();
                return redirect()->back()->with('verification_success', 'Appoinment Verified!');
            } elseif ($appointment->verified == 1) {
                $appointment->verified = !$appointment->verified;
                $appointment->save();
                return redirect()->back()->with('unverification_success', 'Appoinment Un-Verified!');
            }
        }
        return redirect()->back();
    }

    public function toggleStatus($id)
    {
        $appointment = Appointment::findOrFail($id);
        if ($appointment->verified != 0) {
            if ($appointment->status != 1) {
                $appointment->status = !$appointment->status;
                $appointment->save();
                return redirect()->back()->with('verification_success', 'Appoinment Completed!');
            }
        }
        return redirect()->back();
    }

    public function editAppointment(Appointment $appts)
    {
        $doc = Doctor::with('userDoctor')->where('doctor_id', $appts->doctor_id)->first();
        return view('client.edit-appointment', compact('appts', 'doc'));
    }

    public function updateAppointment(Request $request, Appointment $appts)
    {
        // dd($appts);
        // $appt = Appointment::where('appts',$appts)->first();
        // $appt = Appointment::find($appts);
        $appts->appointment_date_bs = $request->date_bs;
        $appts->appointment_date_ad = $request->date_ad;
        $appts->appointment_start_time = $request->starttime;
        $appts->appointment_end_time = $request->endtime;
        $appts->description = $request->description;
        $appts->save();

        return redirect()->route('client.appointments')->with('info_success','Appointment Updated Successfully!');
    }

    public function destroy(Appointment $appts)
    {
        $appts->delete();
        return redirect()->route('client.appointments');
    }

    public function appointmentWith(Doctor $doctor)
    {
        // dd($doctor);
        // $doc = Doctor::with('userDoctor')->where('id',$doctor)->first();
        // dd($doc);
        return view('client.appointment-with-doctor', compact('doctor'));
    }
}
