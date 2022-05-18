<?php

namespace Kata\CategoryTree;

class Printer
{

    private function getStringTree(Category $parent, int $spaces = 0){
        $children = $parent->children();
        if(empty($children)){
            return str_repeat('  ',$spaces++).$parent->name().PHP_EOL;
        }else{
            $stringTree = str_repeat('  ',$spaces++).$parent->name().PHP_EOL;
            usort($children, fn($a,$b) => $a->name()<=>$b->name());
            foreach($children as $child){
                $stringTree = $stringTree.$this->getStringTree($child, $spaces); 
            }
            return $stringTree;

        }
    }
    public function build(Category $parent, int $spaces = 0): string
    {
        return $this->getStringTree($parent);
    }
}
