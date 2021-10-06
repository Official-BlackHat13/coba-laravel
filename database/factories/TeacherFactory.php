<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

    protected $mapel_id = ["Ing-X", "Pemdas-X", "D3G-X", "Mtk-X", "Indo-X", "Komjar-X", "Ing-XI", "PBO-XI", "WebPG-XI", "DGP-XI", "AIJ-XI", "Indo-XI", "Ing-XII", "PBO-XII", "WebPG-XII", "DGP-XII", "AIJ-XII", "Indo-XII"];
    protected $auto_increment = 0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $hp_number = '8' . rand(1,9);
        $length = [7,8,9];
        for ($i = 0; $i < $length[rand(0,2)]; $i++) {
            $hp_number .= rand(0,9);
        }

        if (strlen($hp_number) == 11) {
            $hp_number = '(+62) '. Str::substr($hp_number, 0, 3). ' ' .Str::substr($hp_number, 3, 4). ' ' .Str::substr($hp_number, 7, 4);
        }
        else if (strlen($hp_number) == 10) {
            $hp_number = '(+62) '. Str::substr($hp_number, 0, 2). ' ' .Str::substr($hp_number, 2, 4). ' ' .Str::substr($hp_number, 6, 4);
        }
        else if (strlen($hp_number) == 9) {
            $hp_number = '(+62) '. Str::substr($hp_number, 0, 2). ' ' .Str::substr($hp_number, 2, 4). ' ' .Str::substr($hp_number, 6, 3);
        }

        $lastTeacher_id =Teacher::pluck('teacher_id');

        $teacher_id = '';

        if (count($lastTeacher_id) > 0) {
            $lastTeacher_id = explode('.', $lastTeacher_id->last());
            $lastTeacher_id = intval($lastTeacher_id[1]);
            $this->auto_increment += 1;
            if ($lastTeacher_id + $this->auto_increment < 10) {
                $teacher_id = '0021.00'.$lastTeacher_id + $this->auto_increment;
            }
            elseif ($lastTeacher_id + $this->auto_increment < 100) {
                $teacher_id = '0021.0'.$lastTeacher_id + $this->auto_increment;
            }
            else {
                $teacher_id = '0021.'.$lastTeacher_id + $this->auto_increment;
            }
        }
        else {
            $this->auto_increment += 1;
            if ($this->auto_increment < 10) {
                $teacher_id = '0021.00'.$this->auto_increment;
            }
            elseif ($this->auto_increment < 100) {
                $teacher_id = '0021.0'.$this->auto_increment;
            }
            else {
                $teacher_id = '0021.'.$this->auto_increment;
            }
        }

        return [
            'nama' => $this->faker->name(),
            'email' => $this->faker->unique()->freeEmail(),
            'teacher_id' => $teacher_id,
            'nik' => $this->faker->nik(),
            'mapel_id' => $this->mapel_id[rand(0,count($this->mapel_id)-1)],
            'hp_number' => $hp_number,
            'alamat' => $this->faker->address()
        ];
    }
}
