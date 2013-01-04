<?php
/* Catch all dev errors */
error_reporting(E_ALL);

/* Define a few constants for the app */
define('APP_NAME', 'Tango Carder');
define('ASSET_DIR', 'public');
define('APP_DIR', 'application');
define('DEFAULT_CONTROLLER', 'home');

/* Load the main app class */
include(APP_DIR . '/TangoCarder.php');