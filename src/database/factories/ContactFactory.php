<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory {
    public function definition(): array {
        return [
            'category_id'=>Category::inRandomOrder()->value('id'),
            'first_name'=>fake()->firstName(),
            'last_name'=>fake()->lastName(),
            'gender'=>fake()->randomElement([
                Contact::GENDER_MALE,
                Contact::GENDER_FEMALE,
                Contact::GENDER_OTHER,
            ]),
            'email'=>fake()->unique()->safeEmail(),
            'tel'=>fake()->phoneNumber(),
            'address'=>fake()->prefecture() . fake()->city() . fake()->streetAddress(),
            'building'=>fake()->secondaryAddress(),
            'detail'=>fake()->realText($maxNbChars = 200),
        ];
    }
}
