<?php

namespace Adrem\Seo\Helper\Processor;

use Adrem\Seo\Model\Config;

class Stylesheet implements \Adrem\Seo\Api\Data\HtmlContentProcessorInterface
{
    const PATTERN = '/\<link(.*?)rel=\"stylesheet\"(.*?)?\>/i';

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
        if (! $this->config->isNeedToProcessStylesheet()) {
            return $content;
        }

        preg_match_all(self::PATTERN, $content, $links);
        if (! empty($links[0])) {
            $content = preg_replace(self::PATTERN, '', $content);
            $content = str_replace(
                Config::PLACEHOLDER,
                implode('', $links[0]) . Config::PLACEHOLDER,
                $content
            );
        }

        return $content;
    }
}
