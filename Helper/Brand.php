<?php

namespace Develodesign\HyvaCmsWidgets\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\View\Context;

class Brand extends AbstractHelper
{

    public function getUrlFromName( $brand ) {
        return $this->_urlBuilder->getUrl( 'brands/' . strtolower( preg_replace('#[^0-9a-z\.]+#i', '-', $brand) ) );
    }

}
