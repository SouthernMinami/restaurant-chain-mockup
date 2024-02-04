<?php

require_once 'vendor/autoload.php';

require_once 'Models/Users/Employees/Employee.php';
require_once 'Models/RestaurantLocations/RestaurantLocation.php';

require_once 'Helpers/RandomGenerator.php';

use Helpers\RandomGenerator;

$employeeCount = $_POST['employeeCount'] ?? 3;
$salaryMin = $_POST['salaryMin'] ?? 100;
$salaryMax = $_POST['$salaryMax'] ?? 100000;
$restaurantCount = $_POST['restaurantCount'] ?? 1;
$postalCodeMin = $_POST['postalCodeMin'] ?? '10000-1000';
$postalCodeMax = $_POST['postalCodeMax'] ?? '99999-9999';
$format = $_POST['format'] ?? 'html';

$employeeCount = (int) $employeeCount;
$salaryMin = (int) $salaryMin;
$salaryMax = (int) $salaryMax;
$resutaurantCount = (int) $resutaurantCount;

// Validations
if (is_null($employeeCount) || is_null($format) || is_null($restaurantCount) || is_null($postalCodeMin) || is_null($postalCodeMax)) {
    exit('Missing any required parameters. Try again.');
}

if (!is_numeric($employeeCount) || $employeeCount < 1 || $employeeCount > 100) {
    exit('Invalid count parameter. Employee count must be a number between 1 and 100');
}

if (!is_numeric($restaurantCount) || $restaurantCount < 1 || $restaurantCount > 100) {
    exit('Invalid count parameter. Restaurant count must be a number between 1 and 100');
}

// PostalCodeMinの０文字目が0ではいけない
// PostalCodeMaxの０文字目が0ではいけない
// PostalCodeMin, PostalCodeMaxの-の位置が違う
// 11111-1111の形式でない
if (!preg_match('/^[1-9][0-9]{4}-[0-9]{4}$/', $postalCodeMin) || !preg_match('/^[1-9][0-9]{4}-[0-9]{4}$/', $postalCodeMax)) {
    exit('Invalid postal code format. Must be in the format: 11111-1111');
}

$allowedFormats = ['html', 'markdown', 'json', 'txt'];
if (!in_array($format, $allowedFormats)) {
    exit('Invalid format parameter. Must be one of: ' . implode(',', $allowedFormats));
}

$chains = RandomGenerator::generateChainsArray(1, $restaurantCount, $postalCodeMin, $postalCodeMax, $employeeCount, $salaryMin, $salaryMax);

if ($format === 'markdown') {
    header('Content-Disposition: attatchment; filename="restaurant-chains.md"');
    foreach ($chains as $chain) {
        echo $chain->toMarkdown();
    }
} elseif ($format === 'json') {
    header('Content-Type: application/json');
    header('Content-Disposition: attatchment; filename="restaurant-chains.json"');
    $chainsArray = array_map(fn($chain) => $chain->toArray(), $chains);
    echo json_encode($chainsArray);
} elseif ($format === 'txt') {
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="restaurant-chains.txt"');
    foreach ($chains as $chain) {
        echo $chain->toString();
    }
} else {
    header('Content-Type: text/html');
    include 'mockup.php';
}

