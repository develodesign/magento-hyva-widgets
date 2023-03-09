<?php
/**
 * Hyvä Themes - https://hyva.io
 * Copyright © Hyvä Themes 2020-present. All rights reserved.
 * See https://hyva.io/license
 */

declare(strict_types=1);

namespace Develodesign\CmsWidgets\Block\Widget;

use Magento\Widget\Block\BlockInterface;
use Magento\Framework\DataObject;

class Multistep extends AbstractColumns implements BlockInterface
{
    /**
     * Fetches `conditions` containing serialized items then turns them into DataObjects
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
