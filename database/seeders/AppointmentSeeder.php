<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Teacher;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student = User::where('email', 'ali@example.com')->first();
        $teacher = Teacher::where('full_name', 'Ustaz Ahmad')->first();

        if ($student && $teacher) {
            Appointment::create([
                'user_id' => $student->id,
                'teacher_id' => $teacher->id,
                'appointment_date' => now()->addDays(3),
                'status' => 'Pending',
            ]);
        }
    }
}
