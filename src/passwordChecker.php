<?php

namespace App;

class passwordChecker
{


    public function __construct(string $mdp) {
        $this->mdp = $mdp;
        $this->nbr = 10;
    }


    public function pwdCheck(){
        $longueur = strlen($this->mdp);

        if($longueur > $this->nbr){
            return true;
        } else {
            return false;
        }
    }
}