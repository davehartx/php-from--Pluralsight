<?php

    $roles = ['buyer', 'seller', 'admin', 'guest'];

    /*
    for ($i = 0; $i < count($roles); $i++) {
        echo $roles[$i] . '<br>';
    }
    */

    foreach ($roles as $role) {
        echo "$role<br>";
    }