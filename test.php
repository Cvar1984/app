<?php

require './vendor/autoload.php';

(new \Cvar1984\App\SignalHandler())->setSighup(function() {
    echo 'sigterm';
});
\Cvar1984\App\SignalHandler::on('a', function() {
    echo 'a';
});
\Cvar1984\App\SignalHandler::call('a');
