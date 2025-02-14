<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = [];
        $amount = rand(1,10);

        for($x = 0; $x < $amount; $x++ ){
           $images[] = fake()->randomElement(['img_1.jpg', 'img_2.jpg', 'img_3.jpg', 'img_4.jpg', 'img_5.jpg', 'img_6.jpg','img_7.jpg','img_8.jpg' ]);
        }
        return [
            'address' => fake()->streetAddress(),
            'description' => fake()->paragraph(),
            'bedrooms' => fake()->randomNumber(1, true),
            'bathrooms' => fake()->randomNumber(1, true),
            //'price' => fake()->randomFloat(2, 10, 100),
            'price' => fake()->randomNumber(5, true),
            'property_listing_type_id' => fake()->numberBetween(1, 3),
            'offer_type' => fake()->randomElement(['For Sale', 'For Rent', 'For Lease']),
            'sq_ft' => fake()->randomNumber(3, true),
            'year_built' => fake()->year(),
            'city_id' => fake()->numberBetween(1, 5),
            'postal_code' => fake()->randomNumber(5, true),
            'images' => json_encode($images),
        ];
    }
}
