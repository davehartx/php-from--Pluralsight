<?php

    $skillLevel = 201;

    $competentEnough = 
        ($skillLevel >= 100) &&
        ($skillLevel <= 200);

    $notCompetentEnough = 
        ($skillLevel < 100) ||
        ($skillLevel > 200);

    // $notCompetentEnough = !$competentEnough;

    /*
    if ($competentEnough) {
        echo '<p>You are competent enough.</p>';
    } else {
        echo '<p>You still need some learning to do.</p>';
    }
    */

    echo ($competentEnough) ? 
        '<p>You are competent enough.</p>' : 
        '<p>You still need some learning to do.</p>';