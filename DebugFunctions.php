<?php

function dump(mixed $var): void {
    echo '<pre style="background-color: #0b2e13;color: whitesmoke; padding: 5px;">';
    var_dump($var);
}
function d(mixed $var): void {
    dump($var);
    die;
}