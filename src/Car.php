<?php
    class Car
    {
        private $year;
        private $make_model;
        private $price;
        private $miles;
        private $image;

        function __construct($newYear, $newMakeModel, $newPrice, $newMiles, $newImage)
        {
            $this->year = $newYear;
            $this->make_model = $newMakeModel;
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
            array_push($_SESSION['car_list'], $this);
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

?>
