<?php

require_once 'autoload.php';

class ChienDeChasse extends Chien implements Animal {
    public function crier(): string {
        return "Awouuuuu!";
    }
}
?>
