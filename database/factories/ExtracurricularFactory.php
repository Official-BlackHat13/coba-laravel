<?php

namespace Database\Factories;

use App\Models\Extracurricular;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExtracurricularFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Extracurricular::class;

    private $extracurricular = [
        [
            "name" => "Sepak Bola",
            "slug" => "sepak-bola",
            "year" => 2004
        ],
        [
            "name" => "Basket",
            "slug" => "basket",
            "year" => 2004
        ],
        [
            "name" => "Web Design Club",
            "slug" => "web-design-club",
            "year" => 2015
        ],
        [
            "name" => "English Club",
            "slug" => "english-club",
            "year" => 2009
        ],
        [
            "name" => "Math Club",
            "slug" => "math-club",
            "year" => 2008
        ],
        [
            "name" => "Tabuh",
            "slug" => "tabuh",
            "year" => 2010
        ],
        [
            "name" => "Tari",
            "slug" => "tari",
            "year" => 2010
        ],
        [
            "name" => "Pramuka",
            "slug" => "pramuka",
            "year" => 2006
        ],
        [
            "name" => "Teater",
            "slug" => "teater",
            "year" => 2006
        ],
    ];
    private $auto_increment = -1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->auto_increment += 1;
        return [
            "name" => $this->extracurricular[$this->auto_increment]['name'],
            "slug" => $this->extracurricular[$this->auto_increment]['slug'],
            "year" => $this->extracurricular[$this->auto_increment]['year']
        ];
    }
}
