<?php

function validResidence($residence)
{
    return $residence == "yes" OR $residence == "no"; //use the name attribute in the residence status
}

function validServices($selectedServices)
{
    $validServices = array("utilities", "rent", "gas", "thrift","food","others");

    //Check each topping and return false if it's not valid
    foreach($selectedServices as $selectedService) {
        if (!in_array($selectedService, $validServices)) {
            //echo "<p>Go away evil doer!</p>";
            return false;
        }
    }
    return true;
}
