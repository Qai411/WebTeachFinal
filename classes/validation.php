<?php
class validator{

    public function validate($name, $regex, &$generalErrors){
        if(empty($_POST[$name])){
            $generalErrors[$name] = "Required";
        }else{
            $input = $_POST[$name];
            if(!preg_match($regex, $input)){
                $generalErrors[$name] = "Invalid";
            }
        }
    }

    public function validateSelect($name, &$generalErrors){
        if(empty($_POST[$name])){
            $generalErrors[$name] = "Required";
        }
    }

    public function validateRept($name, &$reptilelErrors){
        if(empty($_POST[$name])){
            $reptilelErrors[$name] = "Required";
        }
    }

    public function validateMammal($name, &$mammalErrors){
        if(empty($_POST[$name])){
            $mammalErrors[$name] = "Required";
        }
    }

    public function validateBird($name, &$birdErrors){
        if(empty($_POST[$name])){
            $birdErrors[$name] = "Required";
        }
    }
}

?>