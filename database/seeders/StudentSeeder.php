<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a user for the student
        $user = User::create([
            'name' => 'Ahmad Bin Rahim',
            'email' => 'ahmad@example.com',
            'password' => Hash::make('password'),
        ]);

        // Assign student role
        $user->assignRole('student');

        // Create a student record
        Student::create([
            'user_id' => $user->id,
            'full_name' => 'Ahmad Bin Rahim',
            'age' => 10,
            'class' => 'Abu Hurairah',
            'address' => 'No. 12, Kampung Baru, Kuala Lumpur',
            'emergency_contact_name' => 'Rahim Bin Hassan',
            'emergency_contact_no' => '0179876543',
            'join_date' => now(),
            'status' => 'Active',
        ]);
    }
}
