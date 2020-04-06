<?php
    function is_lower($char){
        return ($char>='a' && $char<='z');
    }

    function is_uper($char){
        return ($char>='A' && $char<='Z');
    }

    function is_entier($char){
        return ($char>='0' && $char<='9');
    }

    function my_strlen($char){
        $i=0;
        while (isset($char[$i])){
            $i=$i+1;
        }
        return ($i);
    }

    function is_valide($char){
        for ($i=0; $i<my_strlen($char); $i++){
            if (!(is_lower($char[$i])) && !(is_uper($char[$i]))){
                return false;
            }
        }
        return true;
    }

    function is_number($char){
        for ($i=0; $i<my_strlen($char); $i++){
            if (!(is_entier($char[$i]))){
                return false;
            }
        }
        return ($char>0);
    }

    function is_char_in_string($char, $mot){
        for ($i=0; $i < my_strlen($mot); $i++) { 
            if ($mot[$i]==$char) {
                return true;
            }
        }
        return false;
    }

    function count_char_in_string($char1, $char2, $chaine){
        $cpt=0;
        for ($i=0; $i<my_strlen($chaine); $i++){
            if ($char1==$chaine[$i]){
                $cpt++;
            }
            if ($char2==$chaine[$i]){
                $cpt++;
            }
        }
        return $cpt;
    }

    function my_trim($chaine, $chaine2=''){
        
        for ($i=0; $i<my_strlen($chaine); $i++){
            if ($chaine[$i]!=' '){
                $chaine2.=$chaine[$i];
            }
        }

        return ($chaine2);
    }

?>
