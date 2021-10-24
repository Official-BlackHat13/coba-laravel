<?php

namespace Database\Factories;

use App\Models\School_Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = School_Schedule::class;

    protected $jadwal = [
        ["kelas" => 'xrpl1', "hari" => 'Senin', "jam_1" => 'Ing-X', "jam_2" => 'Ing-X', "jam_3" => 'Pemdas-X', "jam_4" => 'Pemdas-X', "jam_5" => 'D3G-X', "jam_6" => 'D3G-X', "jam_7" => 'Mtk-X-1', "jam_8" => 'Mtk-X-1'],
        ["kelas" => 'xrpl1', "hari" => 'Selasa', "jam_1" => 'Ing-X', "jam_2" => 'Ing-X', "jam_3" => 'Pemdas-X', "jam_4" => 'Pemdas-X', "jam_5" => 'D3G-X', "jam_6" => 'D3G-X', "jam_7" => 'Mtk-X-1', "jam_8" => 'Mtk-X-1'],
        ["kelas" => 'xrpl1', "hari" => 'Senin', "jam_1" => 'Ing-X', "jam_2" => 'Ing-X', "jam_3" => 'Pemdas-X', "jam_4" => 'Pemdas-X', "jam_5" => 'D3G-X', "jam_6" => 'D3G-X', "jam_7" => 'Mtk-X-1', "jam_8" => 'Mtk-X-1'],
        ["kelas" => 'xrpl1', "hari" => 'Senin', "jam_1" => 'Ing-X', "jam_2" => 'Ing-X', "jam_3" => 'Pemdas-X', "jam_4" => 'Pemdas-X', "jam_5" => 'D3G-X', "jam_6" => 'D3G-X', "jam_7" => 'Mtk-X-1', "jam_8" => 'Mtk-X-1'],
        ["kelas" => 'xrpl1', "hari" => 'Senin', "jam_1" => 'Ing-X', "jam_2" => 'Ing-X', "jam_3" => 'Pemdas-X', "jam_4" => 'Pemdas-X', "jam_5" => 'D3G-X', "jam_6" => 'D3G-X', "jam_7" => 'Mtk-X-1', "jam_8" => 'Mtk-X-1'],
        ["kelas" => 'xrpl1', "hari" => 'Senin', "jam_1" => 'Ing-X', "jam_2" => 'Ing-X', "jam_3" => 'Pemdas-X', "jam_4" => 'Pemdas-X', "jam_5" => 'D3G-X', "jam_6" => 'D3G-X', "jam_7" => 'Mtk-X-1', "jam_8" => 'Mtk-X-1'],
        ["kelas" => 'xrpl1', "hari" => 'Senin', "jam_1" => 'Ing-X', "jam_2" => 'Ing-X', "jam_3" => 'Pemdas-X', "jam_4" => 'Pemdas-X', "jam_5" => 'D3G-X', "jam_6" => 'D3G-X', "jam_7" => 'Mtk-X-1', "jam_8" => 'Mtk-X-1'],
        ["kelas" => 'xrpl1', "hari" => 'Senin', "jam_1" => 'Ing-X', "jam_2" => 'Ing-X', "jam_3" => 'Pemdas-X', "jam_4" => 'Pemdas-X', "jam_5" => 'D3G-X', "jam_6" => 'D3G-X', "jam_7" => 'Mtk-X-1', "jam_8" => 'Mtk-X-1'],
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }
}
