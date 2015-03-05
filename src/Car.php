<?php
    class Car
    {
        private $year;
        private $make_model;
        private $price;
        private $miles;
        private $image;

        function __construct($newYear, $new_make_model, $newPrice, $newMiles, $newImage)
        {
            $this->year = $newYear;
            $this->make_model = $new_make_model;
            $this->price = $newPrice;
            $this->miles = $newMiles;
            $this->image = $newImage;
        }

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

        function save()
        {
            array_push($_SESSSION['car_list'], $this);
        }

        static function getAll()
        {
            return $_SESSION['car_list'];
        }

        static function deleteAll()
        {
            $_SESSION['car_list'] = array();
        }
    }

    $porsche = new Car(2014, "Porsche 911", 113343, 5423, "../img/porsche.jpeg");
    $ford = new Car(2011, "Ford F450", 55483, 8394, "../img/ford.jpeg");
    $lexus = new Car(2013, "Lexus RX 350", 44700, 20000, "../img/lexus.jpeg");
    $mercedes = new Car(2009, "Mercedes Benz CLS550", 39900, 37373, "../img/merc.jpeg");

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
