<?php
/**
 * Hyvä Themes - https://hyva.io
 * Copyright © Hyvä Themes 2020-present. All rights reserved.
 * See https://hyva.io/license
 */

declare(strict_types=1);

namespace Develo\HyvaWidgets\Block\Widgets;

use Magento\Framework\DataObject;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
use Magento\Widget\Helper\Conditions;

class AbstractColumns extends Template implements BlockInterface
{

    protected $preparedColumns;
    
    /**
     * @var Conditions
     */
    private $conditionsHelper;

    /**
     * @param Template\Context $context
     * @param Conditions $conditionsHelper
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Conditions $conditionsHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->conditionsHelper = $conditionsHelper;
    }

    /**
     * @return array
     */
    public function getConditions(): array
    {
        $conditions = $this->getData('conditions_encoded')
            ? $this->getData('conditions_encoded')
            : $this->getData('conditions');

        return $conditions ? $this->conditionsHelper->decode($conditions) : [];
    }

    /**
     * @param string $path
     * @return string
     * @throws NoSuchEntityException
     */
    public function getImageUrlByPath(string $path): string
    {
        return $this->_storeManager
                ->getStore()
                ->getBaseUrl(UrlInterface::URL_TYPE_MEDIA) . $path;
    }

    /**
     * @param string $imageField
     * @return string
     * @throws NoSuchEntityException
     */
    public function getImageUrl(string $imageField = 'image'): string
    {
        $url = $this->getData($imageField);
        if (!$url) {
            return '';
        }

        if (strpos($url, $this->getMediaUrl()) !== 0) {
            return $this->getMediaUrl() . '/' . $url;
        }

        return $url;
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getMediaUrl(): string
    {
        return $this->_storeManager
            ->getStore()
            ->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);
    }

    /**
     * @param $urlLink
     * @return string
     */
    public function getPreparedUrl($urlLink): string
    {
        $preparedLink = $urlLink;
        if (strpos($urlLink, 'http') === false) {
            $urlLink = explode('?', $urlLink);
            $preparedLink = $this->getUrl(trim($urlLink[0], '/'));
            if (!empty($urlLink[1])) {
                $preparedLink = rtrim($preparedLink, '/') . '?' . $urlLink[1];
            }
        }
        return $preparedLink;
    }

    /**
     * @param string $descriptionField
     * @return string|string[]
     */
    public function getPreparedDescription(string $descriptionField = 'description')
    {
        return str_replace('\EOL', '<br />', $this->getData($descriptionField));
    }
}
