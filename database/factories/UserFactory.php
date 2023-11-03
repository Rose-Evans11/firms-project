<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'referenceNumber' => fake()->unique()->referenceNumber(),
            'firstName' => fake()->firstName(),
            'middleName' => fake()->middleName(),
            'lastName' => fake()->lastName(),
            'extensionName' => fake()->extensionName(),
            'sex' => fake()->sex(),
            'barangayID' => fake()->barangayID(),
            'cityID' => fake()->cityID(),
            'provinceID' => fake()->provinceID(),
            'regionID' => fake()->regionID(),
            'contactNumber' => fake()->contactNumber(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'validID' =>fake()->validID(),
            'validIDPhoto' =>fake()->validIDPhoto(),
            'validIDNumber' =>fake()->unique()->validIDNumber(),
            'isActive' =>fake()->isActive(),
            'photo' =>fake()->photo(),
            'age' =>fake()->age(),
            'birthday' =>fake()->birthday(),
            'birthplace' =>fake()->birthplace(),
            'educationID' =>fake()->educationID(),
            'religionID' =>fake()->educationID(),
            'civilID' =>fake()->civilID(),
            'spouseName' =>fake()->spouseName(),
            'motherName' =>fake()->motherName(),
            'fourPs' =>fake()->fourPs(),
            'indigenous' =>fake()->indigenous(),
            'typeIPID' =>fake()->typeIPID(),
            'householdHead' =>fake()->householdHead(),
            'householdName' =>fake()->householdName(),
            'householdRelation' =>fake()->householRelation(),
            'householdCount' =>fake()->householdCount(),
            'householdMale' =>fake()->householdMale(),
            'householdFemale' =>fake()->householdFemale(),
            'farmAssociationID' =>fake()->farmAssociationID(),
            'contactPerson' =>fake()->contactPerson(),
            'emergenceNumber' =>fake()->emergenceNumber(),
            'beneficiaries1' =>fake()->beneficiaries1(),
            'relationBeneficiaries1' =>fake()->relationBeneficiaries1(),
            'beneficiaries2' =>fake()->beneficiaries2(),
            'relationbeneficiaries2' =>fake()->relationbeneficiaries2(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
