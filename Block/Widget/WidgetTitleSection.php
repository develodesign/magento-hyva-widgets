<?php
/**
 * Hyvä Themes - https://hyva.io
 * Copyright © Hyvä Themes 2020-present. All rights reserved.
 * See https://hyva.io/license
 */

declare(strict_types=1);

namespace Develodesign\HyvaCmsWidgets\Block\Widget;

use Magento\Backend\Block\Template;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Data\Form\Element\Renderer\RendererInterface as FormElementRenderer;

class WidgetTitleSection extends Template implements FormElementRenderer
{

    /**
     * @var AbstractElement
     */
    private $element;

    /**
     * @var string
     */
    protected $_template = "widget/widget_title_section.phtml";
        
    /**
     * @param AbstractElement $element
     * @return string
     */
    public function render(AbstractElement $element): string
    {
        $this->element = $element;
        return $this->toHtml();
    }

    /**
     * @return AbstractElement
     */
    public function getElement(): AbstractElement
    {
        return $this->element;
    }

    /**
     * @return array|mixed|null
     */
    public function getElData()
    {
        return $this->getData('section_name');
    }

    /**
     * @return array|mixed
     */
    public function getValues()
    {
        $values = $this->getElement()->getValue();
        return json_decode(urldecode($values), true) ?: [];
    }
}
