<?php

namespace AnjaliShrivastavaI\TestProject;

use InvalidArgumentException;

class User 
{
    public int $age;
    public array $favorite_movies = [];
    public string $name;
    public string $str_name;
    public string $str;

    /**
     * @param int $age
     * @param string $name
     */
    public function __construct(int $age, string $name)
    {
        $this->age = $age;
        $this->name = $name;
    }

    public function tellName(): string
    {
        return "My name is " . $this->name . ".";
    }

    public function tellAge(): string
    {
        return "I am " . $this->age . " years old.";
    }

    public function addFavoriteMovie(string $movie): bool
    {
        $this->favorite_movies[] = $movie;

        return true;
    }

    public function removeFavoriteMovie(string $movie): bool
    {
        if (!in_array($movie, $this->favorite_movies)) throw new InvalidArgumentException("Unknown movie: " . $movie);

        unset($this->favorite_movies[array_search($movie, $this->favorite_movies)]);

        return true;
    }

    public function arrayHasKey($arr){
        $this->subset_array = $arr;
        return $this->subset_array;
    }

    public function negativeTestcaseForAssertEquals($str){
        $this->str_name = $str;
        return $this->str_name;
    }

}
