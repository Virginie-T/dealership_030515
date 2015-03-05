<?php
    $max_price = $_GET["user_price"];
    $max_mileage = $_GET["user_mileage"];

    class Car
    {
        private $year;
        private $make_model;
        private $price;
        private $miles;
        private $image;

        function setYear($new_year)
        {
            $int_year = (integer) $new_year;
            if ($int_year != 0) {
                $this->year = $int_year;
            }
        }

        function setMakeModel($new_make_model)
        {
            $this->make_model = $new_make_model;
        }

        function setPrice($new_price)
        {
            $int_price = (integer) $new_price;
            if ($int_price != 0) {
                $this->price = $int_price;
            }
        }

        function setMiles($new_miles)
        {
            $int_miles = (integer) $new_miles;
            if ($int_miles != 0) {
                $this->miles = $int_miles;
            }
        }


        function setImage($new_image)
        {
            $this->image = $new_image;
        }

        function getYear()
        {
            return $this->year;
        }

        function getMakeModel()
        {
            return $this->make_model;
        }

        function getPrice()
        {
            return $this->price;
        }

        function getMiles()
        {
            return $this->miles;
        }

        function getImage()
        {
            return $this->image;
        }
    }

    $porsche = new Car();
    $porsche->setYear(2014);
    $porsche->setMakeModel("Porsche 911");
    $porsche->setPrice(113343);
    $porsche->setMiles(5423);
    $porsche->setImage("img/porsche.jpeg");

    $ford = new Car();
    $ford->setYear(2011);
    $ford->setMakeModel("Ford F450");
    $ford->setPrice(55483);
    $ford->setMiles(8394);
    $ford->setImage("img/ford.jpeg");

    $lexus = new Car();
    $lexus->setYear(2013);
    $lexus->setMakeModel("Lexus RX 350");
    $lexus->setPrice(44700);
    $lexus->setMiles(20000);
    $lexus->setImage("img/lexus.jpeg");

    $mercedes = new Car();
    $mercedes->setYear(2009);
    $mercedes->setMakeModel("Mercedes Benz CLS550");
    $mercedes->setPrice(39900);
    $mercedes->setMiles(37373);
    $mercedes->setImage("img/merc.jpeg");

    $cars = array($porsche, $ford, $lexus, $mercedes);

    $searched_cars = array();

    foreach ($cars as $car) {
        $car_price = $car->getPrice();
        $car_miles = $car->getMiles();

        if ($car_miles <= $max_mileage && $car_price <= $max_price) {
            array_push($searched_cars, $car);
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Car Dealership's Homepage</title>
</head>
<body>
    <h1>Your Car Dealership</h1>
    <ul>
        <?php
            if (empty($searched_cars)) {
                echo "No cars fit your criteria";
            }

            foreach ($searched_cars as $your_car) {
                $car_year = $your_car->getYear();
                $car_make = $your_car->getMakeModel();
                $car_price = $your_car->getPrice();
                $car_miles = $your_car->getMiles();
                $car_image = $your_car->getImage();

                echo "<li>$car_year $car_make</li>";
                echo "<ul>";
                    echo "<li><img src=$car_image alt='$car_make'></li>";
                    echo "<li>$$car_price</li>";
                    echo "<li>Miles: $car_miles</li>";
                echo "</ul>";
            }
        ?>
    </ul>
</body>
</html>
