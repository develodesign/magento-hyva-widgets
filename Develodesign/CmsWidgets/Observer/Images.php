<?php

declare(strict_types=1);

namespace Develodesign\CmsWidgets\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Images implements ObserverInterface
{
    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $observer->getResult()->isAllowed = true;
    }
}
