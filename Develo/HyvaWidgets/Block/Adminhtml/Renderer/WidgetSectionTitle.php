<?php
/**
 * Hyvä Themes - https://hyva.io
 * Copyright © Hyvä Themes 2020-present. All rights reserved.
 * See https://hyva.io/license
 */

declare(strict_types=1);

namespace Develo\HyvaWidgets\Block\Adminhtml\Renderer;

use Develo\HyvaWidgets\Block\WidgetConfigs\WidgetTitleSection;
use Magento\Backend\Block\Template;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Exception\LocalizedException;

class WidgetSectionTitle extends Template
{

    /**
     * @param AbstractElement $element
     * @return void
     * @throws LocalizedException
     */
    public function prepareElementHtml(AbstractElement $element)
    {
        $fieldRenderer = $this->getLayout()->createBlock(WidgetTitleSection::class);
        $element->setRenderer($fieldRenderer);
    }
}
