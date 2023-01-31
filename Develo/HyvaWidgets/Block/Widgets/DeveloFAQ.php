<?php
/**
 * Hyvä Themes - https://hyva.io
 * Copyright © Hyvä Themes 2020-present. All rights reserved.
 * See https://hyva.io/license
 */

declare(strict_types=1);

 
namespace Develo\HyvaWidgets\Block\Widgets;

use Magento\Widget\Block\BlockInterface;
use Magento\Framework\DataObject;

class DeveloFAQ extends AbstractColumns implements BlockInterface
{
    /**
     * @var string
     */
    protected $_template = 'widget/develofaq.phtml';

    /**
     * Fetches `conditions` containing serialized items then turns them into DataObjects
     *
     * @return array|mixed
     */
    public function getMultiFieldSteps()
    {
        $content = $this->getConditions();
        
        if ($content && is_array($content)) {
            return array_map(
                function ($data) {
                    return new DataObject($data);
                },
                $content
            );
        }

        return $content;
    }
}
