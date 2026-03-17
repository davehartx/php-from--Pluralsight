<?php

    $skillLevel = 100;

    $competentEnough = 
        ($skillLevel >= 100) &&
        ($skillLevel <= 200);

    $notCompetentEnough = 
        ($skillLevel < 100) ||
        ($skillLevel > 200);

    // $notCompetentEnough = !$competentEnough;

    var_dump($competentEnough);