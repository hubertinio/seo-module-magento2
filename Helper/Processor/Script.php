<?php

namespace Adrem\Seo\Helper\Processor;

use Adrem\Seo\Model\Config;

class Script implements \Adrem\Seo\Api\Data\HtmlContentProcessorInterface
{
    const PATTERN = '#<script(.*?)>(.*?)</script>#is';

    /**
     * @var Config
     */
    protected $config;

    /**
     * Script constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @inheritDoc
     */
    public function process(string $content): string
    {
        if (! $this->config->isNeedToProcessScript()) {
            return $content;
        }

        preg_match_all(self::PATTERN, $content, $scripts);
        if (! empty($scripts[0])) {
            $content = preg_replace(self::PATTERN, '', $content);
            $content = str_replace(
                Config::PLACEHOLDER,
                implode('', $scripts[0]) . Config::PLACEHOLDER,
                $content
            );
        }

        return $content;
    }
}
