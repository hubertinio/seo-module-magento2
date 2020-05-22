<?php

namespace Adrem\Seo\Plugin;

use Zend\Http\PhpEnvironment\Response as Subject;
use Adrem\Seo\Service\HtmlContent as Service;
use Adrem\Seo\Model\Config;

/**
 * Class ResponsePlugin
 * @package Adrem\Seo\Plugin
 */
class ResponsePlugin
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * @var Service
     */
    protected $service;

    /**
     * ResponsePlugin constructor.
     * @param Config $config
     * @param Service $service
     */
    public function __construct(Config $config, Service $service)
    {
        $this->config = $config;
        $this->service = $service;
    }

    /**
     * @param Subject $response
     * @param callable $proceed
     * @return mixed
     */
    public function aroundSendContent(Subject $response, callable $proceed)
    {
        $content = $response->getContent();

        if ($this->isEnabled($content)) {
            $content = $this->service->process($content);
            $response->setContent($content);
        }

        return $proceed();
    }

    /**
     * @param string $content
     * @return bool
     */
    protected function isEnabled(string $content): bool
    {
        return $this->config->isEnabled()
            && (stripos($content, Config::PLACEHOLDER) !== false);
    }
}
