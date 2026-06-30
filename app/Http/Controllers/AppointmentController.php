<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = auth()->user()
            ->appointments()
            ->latest()
            ->get();

        return view('user.dashboard', compact('appointments'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'patient_name'  => ['required','string','max:255'],
            'patient_phone' => ['nullable','string','max:50'],
            'complaint'     => ['required','string','min:10'],
            'date'          => ['required','date'],
            'time'          => ['required'],
        ]);

        $data['user_id'] = auth()->id();
        Appointment::create($data);

        return back()->with('success', 'تم إرسال طلب الحجز بنجاح ✅');
    }

    public function destroy(Appointment $appointment)
    {
        abort_unless($appointment->user_id === auth()->id(), 403);

        if ($appointment->status !== 'pending') {
            return back()->with('error', 'لا يمكن حذف طلب تمت مراجعته.');
        }

        $appointment->delete();
        return back()->with('success', 'تم حذف الطلب.');
    }
}
