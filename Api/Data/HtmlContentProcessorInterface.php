<?php

namespace Adrem\Seo\Api\Data;

interface HtmlContentProcessorInterface
{
    /**
     * @param string $content
     * @return string
     */
    public function process(string $content): string;
}
