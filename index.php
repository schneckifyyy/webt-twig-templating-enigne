<?php
require_once 'vendor/autoload.php';
use AdamOgris\WebtTwigTemplatingEngine\VimeoVideo;
use AdamOgris\WebtTwigTemplatingEngine\YoutubeVideo;
$videos = [];

$videos[] = new YoutubeVideo("Rick Astley - Never Gonna Give You Up (Official Music Video)", "YouTube",
    "https://www.youtube.com/embed/dQw4w9WgXcQ?si=alBml4NskPxy8Ll");

$videos[] = new VimeoVideo("Sandstorm", "Vimeo",
    "https://player.vimeo.com/video/1007717548?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479");

$videos[] = new YoutubeVideo("Bibi H - How it is ( wap bap ... ) [Official Video]", "YouTube",
    "https://www.youtube.com/embed/4gSOMba1UdM?si=P5KWLCijfSuC7iJr");

$videos[] = new YoutubeVideo("Michael Wendler - Egal (offizielles Video aus dem Album \"Flucht nach vorn\")", "YouTube",
    "https://www.youtube.com/embed/osxsfgWgqQY?si=kaNb2M8cyuxSZ9go");

$videos[] = new VimeoVideo("Arc'teryx Presents: Jamie", "Vimeo",
    "https://player.vimeo.com/video/1008904782?badge=0&autopause=0&player_id=0&app_id=58479");

$videos[] = new YoutubeVideo("PARABEL - Die Wasserstrahlparabel", "YouTube",
    "https://www.youtube.com/embed/dJ9U_lMvrRU?si=I_nMtfnRflGK9lIa");

$videos[] = new VimeoVideo("The Vandal", "Vimeo",
    "https://player.vimeo.com/video/681971716?badge=0&autopause=0&player_id=0&app_id=58479");

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, ['cache' => false]);

$page = $_GET['page'] ?? 'home';
echo match ($page) {
    'contact' => $twig->render('contact.html.twig'),
    'about' => $twig->render('about.html.twig'),
    'home' => $twig->render('base.html.twig', ['videos' => $videos]),
    default => $twig->render('base.html.twig', ['videos' => $videos]),
};


