<?php
namespace AdamOgris\WebtTwigTemplatingEngine;
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
