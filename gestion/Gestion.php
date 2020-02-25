<?php
namespace P4\Gestion;

class Gestion{

    public function reductionText(string $text, int $numberOfCharacters) :string
    {
        if(strlen($text) > $numberOfCharacters){
            $str = strip_tags($text);
            $str = substr($text, 0, $numberOfCharacters);
            $positionSpace = strpos($str, " ", -10);
            $str = substr($text, 0, $positionSpace);
            $str = $str."...";
            return $str;
        }
        else{
            $text = $text."...";
            return $text;
        }


    }
    public function controlNumber(int $number) :bool
    {
        if($number <= 0 || $number > 100000){
            return false;
        }else{
            return true;
        }
    }
}

