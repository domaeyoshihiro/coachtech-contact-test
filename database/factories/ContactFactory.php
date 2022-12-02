<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{

    protected $model = Contact::class;

    public function definition()
    {
        $postcode1 = $this->faker->postcode1;
        $postcode2 = $this->faker->postcode2;
        return [
            'fullname' => $this->faker->name,
            'gender' => $this->faker->numberBetween(1,2),
            'email' =>$this->faker->email,
            'postcode' =>$postcode1."-".$postcode2,
            'address' =>$this->faker->streetAddress,
            'email' =>$this->faker->email,
            'building_name' =>$this->faker->secondaryAddress,
            'opinion' =>$this->faker->realText(120),
            'created_at' =>$this->faker->date,
            'updated_at' =>$this->faker->date,
        ];
    }
}