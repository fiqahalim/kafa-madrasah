<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a user for the teacher
        $user = User::create([
            'name' => 'Ustaz Mahmood',
            'email' => 'mahmood@example.com',
            'password' => Hash::make('password'),
        ]);

        // Assign teacher role (Make sure roles are set up)
        $user->assignRole('teacher');

        // Create a teacher record
        Teacher::create([
            'user_id' => $user->id,
            'full_name' => 'Ustaz Mahmood',
            'subject' => 'Tajwid',
            'specialty' => 'Quran Recitation',
            'contact_no' => '0123456789',
            'address' => 'No. 5, Jalan Masjid, Kuala Lumpur',
            'join_date' => now(),
            'status' => 'Active',
            'years_of_teaching' => 10,
            'schedule' => 'Monday - Friday, 8AM - 12PM',
        ]);
    }
}
