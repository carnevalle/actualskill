<?php

namespace ActualSkill\CoreBundle\Services;

use Doctrine\ORM\EntityManager;

/**
 * Description of ActualSkillService
 *
 * @author troels.johnsen
 */
class ActualSkillService {

    protected $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function sortByAverageRating(&$array, $type = "ASC"){
        $cur = 1;
        $stack[1]['l'] = 0;
        $stack[1]['r'] = count($array) - 1;

        do {
            $l = $stack[$cur]['l'];
            $r = $stack[$cur]['r'];
            $cur--;

            do {
                $i = $l;
                $j = $r;
                $tmp = $array[(int) ( ($l + $r) / 2 )];

                // partion the array in two parts.
                // left from $tmp are with smaller values,
                // right from $tmp are with bigger ones
                do {

                    if($type == "ASC"){

                        while ($array[$i]->getAverageRating() < $tmp->getAverageRating())
                            $i++;

                        while ($tmp->getAverageRating() < $array[$j]->getAverageRating())
                            $j--;
                    }else{

                        while ($array[$i]->getAverageRating() > $tmp->getAverageRating())
                            $i++;

                        while ($tmp->getAverageRating() > $array[$j]->getAverageRating())
                            $j--;
                    }

                    // swap elements from the two sides
                    if ($i <= $j) {
                        $w = $array[$i];
                        $array[$i] = $array[$j];
                        $array[$j] = $w;

                        $i++;
                        $j--;
                    }
                } while ($i <= $j);

                if ($i < $r) {
                    $cur++;
                    $stack[$cur]['l'] = $i;
                    $stack[$cur]['r'] = $r;
                }
                $r = $j;
            } while ($l < $r);
        } while ($cur != 0);
    }  

    public function sortByLikes(&$array, $type = "ASC"){
        $cur = 1;
        $stack[1]['l'] = 0;
        $stack[1]['r'] = count($array) - 1;

        do {
            $l = $stack[$cur]['l'];
            $r = $stack[$cur]['r'];
            $cur--;

            do {
                $i = $l;
                $j = $r;
                $tmp = $array[(int) ( ($l + $r) / 2 )];

                // partion the array in two parts.
                // left from $tmp are with smaller values,
                // right from $tmp are with bigger ones
                do {

                    if($type == "ASC"){

                        while (count($array[$i]->getLikes()) < count($tmp->getLikes()))
                            $i++;

                        while (count($tmp->getLikes()) < count($array[$i]->getLikes()))
                            $j--;
                    }else{

                        while (count($array[$i]->getLikes()) > count($tmp->getLikes()))
                            $i++;

                        while (count($tmp->getLikes()) > count($array[$i]->getLikes()))
                            $j--;
                    }

                    // swap elements from the two sides
                    if ($i <= $j) {
                        $w = $array[$i];
                        $array[$i] = $array[$j];
                        $array[$j] = $w;

                        $i++;
                        $j--;
                    }
                } while ($i <= $j);

                if ($i < $r) {
                    $cur++;
                    $stack[$cur]['l'] = $i;
                    $stack[$cur]['r'] = $r;
                }
                $r = $j;
            } while ($l < $r);
        } while ($cur != 0);
    } 

    public function sortByName(&$array, $type = "ASC"){
        $cur = 1;
        $stack[1]['l'] = 0;
        $stack[1]['r'] = count($array) - 1;

        do {
            $l = $stack[$cur]['l'];
            $r = $stack[$cur]['r'];
            $cur--;

            do {
                $i = $l;
                $j = $r;
                $tmp = $array[(int) ( ($l + $r) / 2 )];

                // partion the array in two parts.
                // left from $tmp are with smaller values,
                // right from $tmp are with bigger ones
                do {

                    if($type == "ASC"){

                        while ($array[$i]->getFullname() < $tmp->getFullname())
                            $i++;

                        while ($tmp->getFullname() < $array[$j]->getFullname())
                            $j--;
                    }else{

                        while ($array[$i]->getFullname() > $tmp->getFullname())
                            $i++;

                        while ($tmp->getFullname() > $array[$j]->getFullname())
                            $j--;
                    }

                    // swap elements from the two sides
                    if ($i <= $j) {
                        $w = $array[$i];
                        $array[$i] = $array[$j];
                        $array[$j] = $w;

                        $i++;
                        $j--;
                    }
                } while ($i <= $j);

                if ($i < $r) {
                    $cur++;
                    $stack[$cur]['l'] = $i;
                    $stack[$cur]['r'] = $r;
                }
                $r = $j;
            } while ($l < $r);
        } while ($cur != 0);
    }      
}

?>
