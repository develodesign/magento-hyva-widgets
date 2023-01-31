<?php
/**
 * Hyvä Themes - https://hyva.io
 * Copyright © Hyvä Themes 2020-present. All rights reserved.
 * See https://hyva.io/license
 */

declare(strict_types=1);

namespace Develo\HyvaWidgets\Block\Adminhtml\Renderer;

use Magento\Backend\Block\Template;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Data\Form\Element\Renderer\RendererInterface as FormElementRenderer;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\UrlInterface;

class Renderer extends Template implements FormElementRenderer
{
    /**
     * @var AbstractElement
     */
    private $element;

    /**
     * @var string
     */
    protected $_template = 'Develo_HyvaWidgets::widget/field/rows/renderer.phtml';

    /**
     * @param Context $context
     * @param Http $request
     * @param array $data
     */
    public function __construct(
        Context $context,
        Http $request,
        array $data = []
    ) {
        $this->request = $request;
        parent::__construct($context, $data);
    }

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
     * @return string
     * @throws LocalizedException
     */
    public function getAddButtonHtml(): string
    {
        $button = $this->getLayout()->createBlock(
            \Magento\Backend\Block\Widget\Button::class
        )->setData(
            [
                'label' => __('Add Row'),
                'onclick' => 'return ' . $this->getElement()->getHtmlId() . 'RowsControl.addItem()',
                'class' => 'add'
            ]
        );
        $button->setName('add_row_item_button');
        return $button->toHtml();
    }

    /**
     * @return string
     */
    public function getUploadButtonOnClickActionUrl(): string
    {
        return $this->getUrl(
            'cms/wysiwyg_images/index',
            ['target_element_id' => '__target_element_id__', 'type' => 'file']
        );
    }

    /**
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getMediaUrl(): string
    {
        return $this->_storeManager->getStore()
            ->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);
    }

    /**
     * @return AbstractElement
     */
    public function getElement(): AbstractElement
    {
        return $this->element;
    }

    /**
     * @return array|mixed
     */
    public function getValues()
    {
        if (is_array($this->getElement()->getValue())) {
            $values = json_encode($this->getElement()->getValue());
            return json_decode($values, true) ?: [];
        } else {
            $values = str_replace("'", '"', $this->getElement()->getValue());
            return json_decode(str_replace("&#039;", '"', $values), true) ?: [];
        }
    }
}
