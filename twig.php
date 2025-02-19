<?php
require_once 'vendor/autoload.php';

// Set up Twig
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false, // Disable cache for development
]);

// Render the content template (which extends base.html.twig)
echo $twig->render('base.html.twig');

