<?php
// コードベースのファイルオートロード
spl_autoload_extensions(".php");
spl_autoload_register();

use Helpers\RandomGenerator;

// composerの依存関係をオートロード
require_once 'vendor/autoload.php';

// Import the RandomGenerator class
// クエリ文字列からパラメータ取得
$min = $_GET['min'] ?? 5;
$max = $_GET['max'] ?? 20;

// パラメータが整数であることを確認
$min = (int) $min;
$max = (int) $max;

// ランダムなレストランチェーンの配列を生成
$chains = RandomGenerator::generateChainsArray($min, $max);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Chain Mockup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .restaurant-chain {
            margin-bottom: 20px;
            border: 2px solid #000;
            padding: 20px;
            border-radius: 10px;
        }

        .restaurant-location {
            margin-bottom: 20px;
            border: 2px solid #000;
            padding: 20px;
            border-radius: 10px;
        }

        .employee {
            border: 1px solid #000;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <h1>🍴Restaurant Chain Mockup🍴</h1>

    <?php foreach ($chains as $chain): ?>
        <div class="restaurant-chain">
            <h2>
                <?php echo $chain->getName(); ?>
            </h2>
            <?php echo $chain->toHTML(); ?>
            <?php foreach ($chain->getRestaurantLocations() as $location): ?>
                <div class="restaurant-location">
                    <h3>
                        <?php echo $location->getName(); ?>
                    </h3>
                    <?php echo $location->toHTML(); ?>
                    <?php foreach ($location->getEmployees() as $employee): ?>
                        <div class="employee">
                            <h4>
                                <?php echo $employee->getFirstName() . ' ' . $employee->getLastName(); ?>
                            </h4>
                            <?php echo $employee->toHTML(); ?>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php endforeach; ?>
        </div>

    <?php endforeach; ?>
</body>

</html>