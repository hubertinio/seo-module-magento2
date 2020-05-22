<?php

namespace Adrem\Seo\Helper\Processor;

use Adrem\Seo\Model\Config;

class Comments implements \Adrem\Seo\Api\Data\HtmlContentProcessorInterface
{
    const PATTERN = '/<!--(.|\s)*?-->/';

    /**
     * @var Config
     */
    protected $config;

    /**
     * WhiteSpace constructor.
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
        if (! $this->config->isNeedToProcessHtmlComments()) {
            return $content;
        }

        return trim(preg_replace(self::PATTERN, '', $content));
    }
}
