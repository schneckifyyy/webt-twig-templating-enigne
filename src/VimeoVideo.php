<?php
namespace AdamOgris\WebtTwigTemplatingEngine;
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