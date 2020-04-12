<?php

namespace Julia\Test\Plugin;

use Magento\Framework\App\Request\Http;
use Magento\Theme\Block\Html\Title;

/**
 * Class ChangeCategoryPlugin
 * @package Julia\Test\Plugin
 */
class ChangeCategoryPlugin
{
    const CATALOG_CATEGORY_PAGE = 'catalog_category_view';

    /**
     * @var Http
     */
    private $request;

    /**
     * ChangeCategoryPlugin constructor.
     * @param Http $request
     */
    public function __construct(Http $request)
    {
        $this->request = $request;
    }

    /**
     * @param Title $subject
     * @param $pageTitle
     * @return string
     */
    public function beforeSetPageTitle(Title $subject, $pageTitle)
    {
        if (self::CATALOG_CATEGORY_PAGE === $this->request->getFullActionName()) {
            return 'Hello World ' . $pageTitle;
        }
    }
}
