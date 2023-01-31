<?php
/**
 * Hyvä Themes - https://hyva.io
 * Copyright © Hyvä Themes 2020-present. All rights reserved.
 * See https://hyva.io/license
 */

declare(strict_types=1);

namespace Develo\HyvaWidgets\Block\WidgetConfigs;

use Magento\Framework\Data\OptionSourceInterface;

class FadeAnimations implements OptionSourceInterface
{
    /**
     * @return array[]
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => '', 'label' => __('No animation')],
            ['value' => 'fade', 'label' => __('Fade')],
            ['value' => 'fade-up', 'label' => __('Fade up')],
            ['value' => 'fade-down', 'label' => __('Fade down')],
            ['value' => 'fade-left', 'label' => __('Fade left')],
            ['value' => 'fade-right', 'label' => __('Fade right')],
            ['value' => 'fade-up-right', 'label' => __('Fade up right')],
            ['value' => 'fade-up-left', 'label' => __('Fade up left')],
            ['value' => 'fade-down-right', 'label' => __('Fade down right')],
            ['value' => 'fade-down-left', 'label' => __('Fade down left')]
        ];
    }
}
