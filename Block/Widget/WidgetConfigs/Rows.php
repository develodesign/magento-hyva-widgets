<?php

declare(strict_types=1);

namespace Develodesign\HyvaCmsWidgets\Block\Widget\WidgetConfigs;

use Develodesign\HyvaCmsWidgets\Block\Widget\Adminhtml\Renderer\Renderer;
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

?>
