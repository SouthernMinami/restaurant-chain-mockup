<?php

namespace Helpers;

use Faker\Factory;
use Models\Users\Employees\Employee;
use Models\RestaurantLocations\RestaurantLocation;
use Models\Companies\RestaurantChains\RestaurantChain;


class RandomGenerator
{
    public static function randomRestaurantChain()
    {
        $faker = Factory::create();

        $randomLocations = [];
        foreach (range(1, 2) as $i) {
            array_push($randomLocations, RandomGenerator::randomRestaurantLocation());
        }
        return new RestaurantChain(
            $faker->company(),
            (int) $faker->year,
            $faker->sentence,
            $faker->phoneNumber(),
            $faker->randomElement(['ファストフード', 'ファミリーレストラン', 'カジュアルダイニング', 'ファインダイニング', 'カフェ']),
            $faker->name,
            $faker->boolean(),

            $faker->numberBetween(1, 10),
            $randomLocations,
            $faker->randomElement(['ピザ', 'ハンバーガー', 'パスタ', 'ステーキ', '寿司', 'ラーメン', 'カレー', '焼肉',]),
            count($randomLocations),
            $faker->boolean(),
            $faker->company()
        );
    }

    public static function randomRestaurantLocation(): RestaurantLocation
    {
        $faker = Factory::create();

        $randomEmployees = [];
        foreach (range(1, 10) as $i) {
            array_push($randomEmployees, RandomGenerator::randomEmployee());
        }

        return new RestaurantLocation(
            $faker->name(),
            $faker->address(),
            $faker->city(),
            $faker->state(),
            $faker->country(),
            $faker->postcode(),
            $faker->boolean(),
            $randomEmployees
        );
    }

    public static function randomEmployee(): Employee
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
            $faker->randomElement(['エリアマネージャー', '店長', 'アシスタントマネージャー', 'ホールスタッフ', 'キッチンスタッフ']),
            $faker->numberBetween(200000, 600000),
            $faker->dateTime(),
            $faker->randomElements(['グッドサービス賞', 'ベストキッチンスタッフ賞', 'ベストウェイター賞', 'ベストマネージャー賞']),
        );
    }

    public static function generateChainsArray(int $min, int $max): array
    {
        $chains = [];
        foreach (range(1, rand($min, $max)) as $i) {
            array_push($chains, RandomGenerator::randomRestaurantChain());
        }
        return $chains;
    }
}
