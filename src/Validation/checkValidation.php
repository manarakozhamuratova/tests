<?php

declare(strict_types=1);

namespace App\Validation;

class CheckValidation
{

    var string $name;
    var string $cardNumber;
    var string $expiration;
    var string $cvv;

    public function __construct(string $name, string $cardNumber, string $expiration, string $cvv)
    {
        $this->name = $name;
        $this->cardNumber = $cardNumber;
        $this->expiration = $expiration;
        $this->cvv = $cvv;
    }

    public function nameValidator(): array
    {
        $err = [];
        $correctName = explode(" ", $this->name);
            if (count($correctName) != 2) {
                $err[] = "ФИ должен принимать в себе 2 слова";
                return $err;
            }
            if (strlen($correctName[0]) < 2 || strlen($correctName[0]) < 2) {
                $err[] = "ФИ должно быть не больше 2 символов";
                return $err;
            }
        return $err;
    }
    public function cardNumberValidator(): array
    {
        $err = [];
        $correctNum = str_split($this->cardNumber);

        foreach ($correctNum as $num) {
            if (!intval($num)) {
                $err[]= 'Only use digit';
                return  $err;
            }
        }
        if (strlen($this->cardNumber) != 12) {
                $err[] = 'Здесь должно быть только 12 число';
                return  $err;
            }
        return  $err;
    }
    public function cvvValidator (): array {
        $err = [];
            if (!intval($this->cvv)) {
                $err[] = 'Only use digit';
                return   $err;
            }
            if (strlen($this->cvv) != 3) {
                $err[] = 'Too many args';
                return $err;
            }
            if (empty($this->cvv)) {
                $err[] = 'Поле не может быть пустым';
                return   $err;
            }
        return $err;
    }
    public function expValidator(): array
    {
        $errors = [];
        $symbols = str_split($this->expiration);
        if (count($symbols) != 5) {
            $errors[] = "Too many characters";
            return $errors;
        }
        for ($i = 0; $i < 5; $i++){
            if (!intval($symbols[$i]) && $i != 2){
                $errors[] = "Incorrect";
                return $errors;
            }
        }
        if ($symbols[2] !== "/"){
            $errors[] = "Use correct symbol";
            return $errors;
        }
        $month = intval($symbols[0] . $symbols[1]);
        $year = intval($symbols[3] . $symbols[4]);
        if (($month<1 || $month>12) || ($year<22 || $year>27)){
            $errors[] = "Incorrect input";
            return $errors;
        }
        return $errors;
    }
}
