<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\UserNotification;
use Illuminate\Http\Request;

class AppointmentAdminController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('user')
            ->latest()
            ->get();

        return view('admin.dashboard', compact('appointments'));
    }

    public function edit(Appointment $appointment)
    {
        return view('admin.edit', compact('appointment'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $data = $request->validate([
            'patient_name'  => ['required','string','max:255'],
            'patient_phone' => ['nullable','string','max:50'],
            'complaint'     => ['required','string','min:10'],
            'date'          => ['required','date'],
            'time'          => ['required'],
            'admin_note'    => ['nullable','string','max:2000'],
        ]);

        $appointment->update($data);

        return redirect()->route('admin.appointments.index')
            ->with('success', 'تم تعديل الطلب ');
    }

    public function approve(Request $request, Appointment $appointment)
    {
        $appointment->update([
            'status' => 'approved',
            'admin_note' => $request->input('admin_note'),
            'reviewed_at' => now(),
        ]);

        UserNotification::create([
            'user_id' => $appointment->user_id,
            'title' => 'تم قبول موعدك ',
            'message' => "تم قبول موعدك بتاريخ {$appointment->date} الساعة {$appointment->time}. " .
                        ($appointment->admin_note ? "ملاحظة الطبيب: {$appointment->admin_note}" : ''),
        ]);

        return back()->with('success', 'تم قبول الموعد وإرسال رسالة للمستخدم.');
    }

    public function reject(Request $request, Appointment $appointment)
    {
        $request->validate([
            'admin_note' => ['required','string','min:3','max:2000'],
        ]);

        $appointment->update([
            'status' => 'rejected',
            'admin_note' => $request->input('admin_note'),
            'reviewed_at' => now(),
        ]);

        UserNotification::create([
            'user_id' => $appointment->user_id,
            'title' => 'تم رفض موعدك ',
            'message' => "نأسف، تم رفض موعدك بتاريخ {$appointment->date} الساعة {$appointment->time}. سبب الرفض: {$appointment->admin_note}",
        ]);

        return back()->with('success', 'تم رفض الموعد وإرسال رسالة للمستخدم.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return back()->with('success', 'تم حذف الطلب.');
    }
}
