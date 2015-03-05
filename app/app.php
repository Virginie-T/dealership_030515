<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Car.php";

    session_start();
    if(empty($_SESSION['car_list'])) {
        $_SESSION['car_list'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Application\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {

        return $app['twig']->render('dealer_template.php', array('cars' => Car::getAll()));
    });

    $app->post("/create_car", function() use ($app) {

        $car = new Car($_POST['year'], $_POST['make_model'], $_POST['price'], $_POST['miles'], $_POST['image']);
        $car->save();

        return $app->['twig']->render('create_car.php', array('newcar' => $car));

        //move all code below to a view file

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
