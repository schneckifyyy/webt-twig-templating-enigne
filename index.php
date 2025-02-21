<?php
require_once 'vendor/autoload.php';
interface Video
{
    public function getName(): string;

    public function getSource(): string;

    public function getEmbedHTML(): string;
}

abstract class AbstractVideo implements Video
{
    public string $name;
    public string $source;

    public function __construct(string $name, string $source)
    {
        $this->name = $name;
        $this->source = $source;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    abstract function getEmbedHTML(): string;
}

class YoutubeVideo extends AbstractVideo
{
    public string $embedHTML;

    public function __construct(string $name, string $source, string $embedHTML)
    {
        parent::__construct($name, $source);
        $this->embedHTML = $embedHTML;
    }

    function getEmbedHTML(): string
    {
        return $this->embedHTML;
    }

}

class VimeoVideo extends AbstractVideo
{
    public $embedHTML;

    public function __construct(string $name, string $source, string $embedHTML)
    {
        parent::__construct($name, $source);
        $this->embedHTML = $embedHTML;
    }

    function getEmbedHTML(): string
    {
        return $this->embedHTML;
    }
}

$videos = [];

$videos[] = new YoutubeVideo("Rick Astley - Never Gonna Give You Up (Official Music Video)", "YouTube",
    "<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/dQw4w9WgXcQ?si=alBml4NskPxy8Ll-\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>");

$videos[] = new VimeoVideo("Sandstorm", "Viemo",
    "<div style=\"padding:56.25% 0 0 0;position:relative;\"><iframe src=\"https://player.vimeo.com/video/1007717548?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479\" frameborder=\"0\" allow=\"autoplay; fullscreen; picture-in-picture; clipboard-write\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\" title=\"Sandstorm\"></iframe></div><script src=\"https://player.vimeo.com/api/player.js\"></script>");

$videos[] = new YoutubeVideo("Bibi H - How it is ( wap bap ... ) [Official Video]", "YouTube",
    "<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/4gSOMba1UdM?si=P5KWLCijfSuC7iJr\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>");

$videos[] = new YoutubeVideo(" Michael Wendler - Egal (offizielles Video aus dem Album \"Flucht nach vorn\") ", "YouTube",
    "<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/osxsfgWgqQY?si=kaNb2M8cyuxSZ9go\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>");
$videos[] = new VimeoVideo("Arc'teryx Presents: Jamie", "Vimeo",
    "<div style=\"padding:56.25% 0 0 0;position:relative;\"><iframe src=\"https://player.vimeo.com/video/1008904782?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479\" frameborder=\"0\" allow=\"autoplay; fullscreen; picture-in-picture; clipboard-write\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\" title=\"Arc'teryx Presents: Jamie\"></iframe></div><script src=\"https://player.vimeo.com/api/player.js\"></script>");
$videos[] = new YoutubeVideo("PARABEL - Die Wasserstrahlparabel", "Youtube", "<iframe class=\"embed-responsive-item\" width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/dJ9U_lMvrRU?si=I_nMtfnRflGK9lIa\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>");

$videos[] = new VimeoVideo("The Vandal", "Vimeo", "<div style=\"padding:56.25% 0 0 0;position:relative;\"><iframe src=\"https://player.vimeo.com/video/681971716?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479\" frameborder=\"0\" allow=\"autoplay; fullscreen; picture-in-picture; clipboard-write\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\" title=\"The Vandal\"></iframe></div><script src=\"https://player.vimeo.com/api/player.js\"></script>");
// Setup Twig

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, ['cache' => false]);

// Routing Logic
$page = $_GET['page'] ?? 'home';
echo match ($page) {
    'contact' => $twig->render('contact.html.twig'),
    'about' => $twig->render('about.html.twig'),
    'home' => $twig->render('base.html.twig', ['videos' => $videos]),
    default => $twig->render('base.html.twig', ['videos' => $videos]),
};


