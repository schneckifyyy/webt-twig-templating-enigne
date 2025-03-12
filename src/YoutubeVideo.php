<?php
namespace AdamOgris\WebtTwigTemplatingEngine;
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