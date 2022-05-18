<?php

namespace Kata\UniqueArray;

class DuplicateRemover
{

    function inArray(array $array ,mixed $val): bool {
        for ($i = 0; $i < count($array); $i++){
            if($array[$i] == $val){
                return true;
            }
        }
        return false;
    }

    public function __invoke(array $input): array
    {
        $noDuplicateArray = [];
        $conuntArray = 0;
        for ($i = 0; $i < count($input); $i++){
            if(!$this->inArray($noDuplicateArray,$input[$i])){
                $noDuplicateArray[$conuntArray++] =  $input[$i];
            }
        }
        return $noDuplicateArray;
    }
}
