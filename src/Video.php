<?php
namespace AdamOgris\WebtTwigTemplatingEngine;
interface Video
{
    public function getName(): string;

    public function getSource(): string;

    public function getEmbedHTML(): string;
}