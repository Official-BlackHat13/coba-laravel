<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->auto_increment += 1;
        $kode_guru = '0021.';
        if ($this->auto_increment < 10) {
            $kode_guru .= '00'. $this->auto_increment;
        }
        elseif ($this->auto_increment >= 10 && $this->auto_increment < 100) {
            $kode_guru .= '0'. $this->auto_increment;
        }
        else {
            $kode_guru .= $this->auto_increment;
        }
        $guru = Teacher::where('id', $kode_guru)->get()->first();
        $role = ($guru->is_teacher) ? 2 : 3;
        return [
            'name' => $guru->nama,
            'username' => $this->faker->userName(),
            'email' => $guru->email,
            'email_verified_at' => now(),
            'teacher_id' => $kode_guru,
            'role_id' => $role,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    private $auto_increment = 0;
}
