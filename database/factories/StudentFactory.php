<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $jurusan = ['Rekayasa Perangkat Lunak', 'Teknik Komputer Jaringan', 'Multimedia', 'Desain Komunikasi Visual', 'Animasi'];
    protected $kelas = [
        "Rekayasa Perangkat Lunak" => ['XII RPL 1', 'XII RPL 2', 'XII RPL 3', 'XII RPL 4', 'XI RPL 1', 'XI RPL 2', 'XI RPL 3', 'X RPL 1', 'X RPL 2', 'X RPL 3', 'X RPL 4'],
        "Teknik Komputer Jaringan" => ['XII TKJ 1', 'XII TKJ 2', 'XI TKJ 1', 'XI TKJ 2', 'X TKJ 1', 'X TKJ 2'],
        "Multimedia" => ['XII MM 1', 'XII MM 2', 'XII MM 3', 'XII MM 4', 'XII MM 5', 'XII MM 6', 'XI MM 1', 'XI MM 2', 'XI MM 3', 'XI MM 4', 'XI MM 5', 'XI MM 6', 'X MM 1', 'X MM 2', 'X MM 3', 'X MM 4', 'X MM 5', 'X MM 6'],
        "Desain Komunikasi Visual" => ['XII DKV', 'XI DKV', 'X DKV'],
        "Animasi" => ['XII AN', 'XI AN', 'X AN']
    ];
    protected $auto_increment = 0;

    public function definition()
    {
        $jurusan = $this->jurusan[rand(0, 4)];
        $count_kelas = count($this->kelas[$jurusan]) - 1;
        
        // No. hp
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

        $lastnis = Student::pluck('nis');

        if (count($lastnis) > 0) {
            $lastnis = $lastnis->max();
            $this->auto_increment += 1;
            return [
                'nama' => $this->faker->name(),
                'email' => $this->faker->unique()->freeEmail(),
                'nis' => $lastnis + $this->auto_increment,
                'jurusan' => $jurusan,
                'kelas' => $this->kelas[$jurusan][rand(0, $count_kelas)],
                'extracurricular_id' => rand(1,9),
                'hp_number' => $hp_number,
                'alamat' => $this->faker->address()
            ];
        }
        else {
            $this->auto_increment += 1;
            return [
                'nama' => $this->faker->name(),
                'email' => $this->faker->unique()->freeEmail(),
                'nis' => $this->auto_increment+5000,
                'jurusan' => $jurusan,
                'kelas' => $this->kelas[$jurusan][rand(0, $count_kelas)],
                'extracurricular_id' => rand(1,9),
                'hp_number' => $hp_number,
                'alamat' => $this->faker->address()
            ];
        }
    }
}
