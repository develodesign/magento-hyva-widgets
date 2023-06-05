<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Develodesign\HyvaCmsWidgets\Block\Widget\Adminhtml;

use Magento\Framework\Option\ArrayInterface;

class StyleSelect implements ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 0, 'label' => __('Default')],

            ['value' => 1, 'label' => __('Blue Left')],
            ['value' => 2, 'label' => __('Blue Right')],

            ['value' => 3, 'label' => __('Light Blue Left')],
            ['value' => 4, 'label' => __('Light Blue Right')],

            ['value' => 5, 'label' => __('Grey Left')],
            ['value' => 6, 'label' => __('Grey Right')],

            ['value' => 7, 'label' => __('White Text Banner')],
            ['value' => 8, 'label' => __('Thin Banner')],
            ['value' => 9, 'label' => __('Thin Banner White Text')]

        ];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [
            0 => __('Default'),
            1 => __('Blue Left'),
            2 => __('Blue Right'),
            3 => __('Light Blue Left'),
            4 => __('Light Blue Right'),
            5 => __('Grey Left'),
            6 => __('Grey Right'),
            7 => __('White Text Banner'),
            8 => __('Thin Banner'),
            9 => __('Thin Banner White Text')
        ];
    }
}
