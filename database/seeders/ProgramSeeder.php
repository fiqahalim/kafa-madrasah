<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Program::create([
            'title' => 'Tahfiz Al-Quran',
            'description' => 'Program intensif hafazan Al-Quran selama 2 tahun.',
            'start_date' => '2025-01-01',
            'end_date' => '2026-12-31',
        ]);

        Program::create([
            'title' => 'Fardhu Ain & Solat',
            'description' => 'Kelas asas Fardhu Ain dan praktikal solat untuk murid KAFA.',
            'start_date' => '2025-02-15',
            'end_date' => '2025-12-31',
        ]);
    }
}
