<?php

function sleeper(int $time = 30) {
    sleep($time);

    return 'Slept for ' . $time; 
};