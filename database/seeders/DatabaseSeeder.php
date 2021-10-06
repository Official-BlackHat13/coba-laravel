<?php
// Contoh Seeder

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Database\Factories\StudentFactory;
use App\Models\Teacher;
use Database\Factories\TeacherFactory;
use App\Models\Extracurricular;
use Database\Factories\ExtracurricularFactory;
use App\Models\User;
use App\Models\School_Schedule;
use Database\Factories\UserFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('siswa')->insert([
        // 	"nama" => "Aditya",
        // 	"email" => "aditya@gmail.com",
        // 	"nis" => "5364",
        // 	"jurusan" => "Rekayasa Perangkat Lunak",
        // 	"kelas" => "XI RPL 2",
        // 	"hp_number" => "08973891362",
        // 	"alamat" => "Jl. Gunung Gede"
        // ]);

        Teacher::factory()->count(30)->create();
        
        Student::factory()->count(30)->create();

        Extracurricular::factory()->count(9)->create();

        User::factory()->count(4)->create();
    }
}
