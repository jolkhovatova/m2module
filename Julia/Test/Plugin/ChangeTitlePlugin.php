<?php

namespace Julia\Test\Plugin;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Request\Http;
use Magento\Theme\Block\Html\Title;
use Magento\Widget\Model\Widget\Instance;

/**
 * Class ChangeTitlePlugin
 * @package Julia\Test\Plugin
 */
class ChangeTitlePlugin
{
    /**
     * @var Session
     */
    private $session;

    /**
     * @var Http
     */
    private $request;
    /**
     * @var Instance
     */
    private $instance;

    /**
     * ChangeTitlePlugin constructor.
     * @param Session $session
     * @param Http $request
     * @param Instance $instance
     */
    public function __construct(
        Session $session,
        Http $request,
        Instance $instance
    ) {
        $this->session = $session;
        $this->request = $request;
        $this->instance = $instance;
    }

    /**
     * @param Title $subject
     * @param $pageTitle
     * @return string
     */
    public function beforeSetPageTitle(Title $subject, $pageTitle)
    {
        if ($this->instance::PRODUCT_LAYOUT_HANDLE === $this->request->getFullActionName()) {
            if ($this->session->isLoggedIn()) {
                return $pageTitle = "Julia Test Sneakers";
            }
        }
    }
}
