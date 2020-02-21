<?php

class gestion{

    public function reductionText($text, $numberOfCharacters){
        if(strlen($text) > $numberOfCharacters){
            $str = strip_tags($text);
            $str = substr($text, 0, $numberOfCharacters);
            $positionSpace = strpos($str, " ", $numberOfCharacters-10);
            $str = substr($text, 0, $positionSpace);
            $str = $str."...";
            return $str;
        }


    }
}

