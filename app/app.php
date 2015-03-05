<?php
    require_once __DIR__."/../vendor/autoload.php";


    session_start();
    if(empty($_SESSION['car_list'])) {
        $_SESSION['car_list'] = array();
    }

    $app = new Silex\Application();

    $app->get("/", function() {
        return "<html>
        <head>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
            <title>Find a Car</title>
        </head>
        <body>
            <div class='container'>
                <h1>Find a Car!</h1>
                <form action='/dealer'>
                    <div class='form-group'>
                        <label for='user_price'>Enter Maximum Price:</label>
                        <input id='user_price' name='user_price' class='form-control' type='number'>
                    </div>
                    <div class='form-group'>
                        <label for='user_mileage'>Enter Maximum Mileage:</label>
                        <input id='user_mileage' name='user_mileage' class='form-control' type='number'>
                    </div>
                    <button type='submit' class='btn-success'>Submit</button>
                </form>
            </div>
        </body>
        </html>
        ";
    });

    $app->get("/dealer", function() {
        $max_price = $_GET["user_price"];
        $max_mileage = $_GET["user_mileage"];

        require_once __DIR__."/../src/dealer.php";



        if (empty($searched_cars)) {
            return "No cars fit your criteria";
        }

        $car_out = "";

        foreach ($searched_cars as $your_car) {
            $car_year = $your_car->getYear();
            $car_make = $your_car->getMakeModel();
            $car_price = $your_car->getPrice();
            $car_miles = $your_car->getMiles();
            $car_image = $your_car->getImage();

            $car_out .= "
            <li>$car_year $car_make</li>
            <ul>
            <li><img src= $car_image alt='$car_make'></li>
                <li>$$car_price</li>
                <li>Miles:$car_miles</li>
            </ul>";
        }

        return "<html>
        <head>
            <title>Your Car Dealership's Homepage</title>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/
            bootstrap/3.3.1/css/bootstrap.min.css'>
            <link rel='stylesheet' href='Users/Guest/Documents/tue3_3_15/dealership/css/styles.css'>
            <link rel='stylesheet' href='../css/styles.css'>
        </head>
        <body>
            <div class='container'>
                <h1>Your Car Dealership</h1>
                <div class='content'>
                    $car_out
                </div>
            </div>
        </body>
        </html>";
    });

    return $app;
?>
