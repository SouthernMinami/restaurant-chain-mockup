<?php

namespace Helpers;

use Faker\Factory;

use Models\Users\Employees\Employee;
use Models\RestaurantLocations\RestaurantLocation;
use Models\Companies\RestaurantChains\RestaurantChain;


class RandomGenerator
{
    public static function randomRestaurantChain(int $locationCount, string $postalCodeMin, string $postalCodeMax, int $employeeCount, int $salaryMin, int $salaryMax)
    {
        $faker = Factory::create();

        $randomLocations = RandomGenerator::generateLocationsArray($locationCount, $postalCodeMin, $postalCodeMax, $employeeCount, $salaryMin, $salaryMax);
        return new RestaurantChain(
            $faker->company(),
            (int) $faker->year,
            $faker->sentence,
            $faker->phoneNumber(),
            $faker->randomElement(['Fast Food', 'Family Restaurant', 'Casual Dining', 'Fine Dining', 'Cafe']),
            $faker->name,
            $faker->boolean(),

            $faker->numberBetween(1, 10),
            $randomLocations,
            $faker->randomElement(['Pizza', 'Hamburger', 'Pasta', 'Steak', 'Sushi', 'Ramen', 'Curry', 'Yakiniku']),
            count($randomLocations),
            $faker->boolean(),
            $faker->company()
        );
    }

    public static function randomRestaurantLocation(string $postalCodeMin, string $postalCodeMax, int $employeeCount, int $salaryMin, int $salaryMax): RestaurantLocation
    {
        $faker = Factory::create();

        // delete the hyphen from the postal code, and then convert to an integer
        $postMinNum = (int) str_replace('-', '', $postalCodeMin);
        $postMaxNum = (int) str_replace('-', '', $postalCodeMax);

        $randomPostalCode = $postMinNum === $postMaxNum ? $postMinNum : $faker->numberBetween($postMinNum, $postMaxNum);
        $formerCode = substr((string) ($randomPostalCode), 0, 5);
        $latterCode = substr((string) $randomPostalCode, 5);
        $PostalCodeStr = '〒' . $formerCode . '-' . $latterCode;

        $randomEmployees = RandomGenerator::generateEmployeesArray($employeeCount, $salaryMin, $salaryMax);

        return new RestaurantLocation(
            $faker->name(),
            $faker->address(),
            $faker->city(),
            $faker->state(),
            $faker->country(),
            $PostalCodeStr,
            $faker->boolean(),
            $randomEmployees
        );
    }

    public static function randomEmployee(int $salaryMin, int $salaryMax): Employee
    {
        $faker = Factory::create();

        return new Employee(
            $faker->numberBetween(1, 10),
            $faker->randomElement([$faker->firstNameMale(), $faker->firstNameFemale()]),
            $faker->lastName(),
            $faker->email,
            $faker->password,
            $faker->phoneNumber(),
            $faker->address(),
            $faker->dateTime(),
            $faker->dateTimeAD(),
            $faker->randomElement(['Area Manager', 'Store Manager', 'Assistant Manager', 'Floor Staff', 'Kitchen Staff']),
            $faker->numberBetween($salaryMin, $salaryMax),
            $faker->dateTime(),
            $faker->randomElements(['Good Service Award', 'Best Kitchen Staff Award', 'Best Waiter Award', 'Best Manager Award']),
        );
    }

    public static function generateChainsArray(int $count, int $locationCount, string $postalCodeMin, string $postalCodeMax, int $employeeCount, int $salaryMin, int $salaryMax): array
    {
        $chains = [];
        foreach (range(1, $count) as $i) {
            array_push($chains, RandomGenerator::randomRestaurantChain($locationCount, $postalCodeMin, $postalCodeMax, $employeeCount, $salaryMin, $salaryMax));
        }
        return $chains;
    }

    public static function generateLocationsArray(int $count, string $postalCodeMin, string $postalCodeMax, int $employeeCount, int $salaryMin, int $salaryMax): array
    {
        $locations = [];
        foreach (range(1, $count) as $i) {
            array_push($locations, RandomGenerator::randomRestaurantLocation($postalCodeMin, $postalCodeMax, $employeeCount, $salaryMin, $salaryMax));
        }
        return $locations;
    }

    public static function generateEmployeesArray(int $count, int $salaryMin, int $salaryMax): array
    {
        $employees = [];
        foreach (range(1, $count) as $i) {
            array_push($employees, RandomGenerator::randomEmployee($salaryMin, $salaryMax));
        }
        return $employees;
    }
}
