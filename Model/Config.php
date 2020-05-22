<?php

namespace Adrem\Seo\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    const PLACEHOLDER = '</body>';
    const XML_PATH_WEB_SEO_PROCESSOR_ENABLED = 'web/seo/html_processor_enabled';
    const XML_PATH_WEB_SEO_PROCESSOR_STYLESHEET = 'web/seo/html_processor_stylesheet';
    const XML_PATH_WEB_SEO_PROCESSOR_SCRIPT = 'web/seo/html_processor_script';
    const XML_PATH_WEB_SEO_PROCESSOR_SPACELESS = 'web/seo/html_processor_spaceless';
    const XML_PATH_WEB_SEO_PROCESSOR_COMMENTS = 'web/seo/html_processor_comments';

    /** @var ScopeConfigInterface */
    protected $configReader;

    /**
     * Config constructor.
     * @param ScopeConfigInterface $configReader
     */
    public function __construct(ScopeConfigInterface $configReader)
    {
        $this->configReader = $configReader;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->configReader->isSetFlag(self::XML_PATH_WEB_SEO_PROCESSOR_ENABLED);
    }

    /**
     * @return bool
     */
    public function isNeedToProcessStylesheet(): bool
    {
        return $this->configReader->isSetFlag(self::XML_PATH_WEB_SEO_PROCESSOR_STYLESHEET);
    }

    /**
     * @return bool
     */
    public function isNeedToProcessScript(): bool
    {
        return $this->configReader->isSetFlag(self::XML_PATH_WEB_SEO_PROCESSOR_SCRIPT);
    }

    /**
     * @return bool
     */
    public function isNeedToProcessWhiteSpace(): bool
    {
        return $this->configReader->isSetFlag(self::XML_PATH_WEB_SEO_PROCESSOR_SPACELESS);
    }

    /**
     * @return bool
     */
    public function isNeedToProcessHtmlComments(): bool
    {
        return $this->configReader->isSetFlag(self::XML_PATH_WEB_SEO_PROCESSOR_COMMENTS);
    }
}
