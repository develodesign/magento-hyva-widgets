<?php
/**
 * Hyvä Themes - https://hyva.io
 * Copyright © Hyvä Themes 2020-present. All rights reserved.
 * See https://hyva.io/license
 */

declare(strict_types=1);

namespace Develo\HyvaWidgets\Block\WidgetConfigs;

use Develo\HyvaWidgets\Block\Adminhtml\Renderer\Renderer;
use Magento\Backend\Block\Template;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Exception\LocalizedException;

class Rows extends Template
{
    protected $rows = [];

    /**
     * @param AbstractElement $element
     * @return void
     * @throws LocalizedException
     */
    public function prepareElementHtml(AbstractElement $element)
    {
        /** @var Renderer $fieldRenderer */
        $fieldRenderer = $this->getLayout()->createBlock(Renderer::class);
        $fieldRenderer->setRows($this->rows);
        $element->setRenderer($fieldRenderer);
    }
}
