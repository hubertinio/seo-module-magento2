<?php

namespace Adrem\Seo\Service;

use Magento\Framework\Exception\LocalizedException;
use Adrem\Seo\Api\Data\HtmlContentProcessorInterface;

/**
 * Class HtmlContent
 *
 * @package Adrem\Seo\Service
 */
class HtmlContent implements HtmlContentProcessorInterface
{
    /**
     * @var array
     */
    protected $processors;

    /**
     * HtmlContent constructor.
     *
     * @param array $processors
     */
    public function __construct(array $processors)
    {
        foreach ($processors as $key => $processor) {
            if (! ($processor instanceof HtmlContentProcessorInterface)) {
                throw new LocalizedException(__('Wrong processor set under the key %1', $key));
            }
        }
        $this->processors = $processors;
    }

    /**
     * @param string $content
     * @return string
     */
    public function process(string $content): string
    {
        foreach ($this->processors as $processor) {
            $content = $processor->process($content);
        }
        return $content;
    }
}
