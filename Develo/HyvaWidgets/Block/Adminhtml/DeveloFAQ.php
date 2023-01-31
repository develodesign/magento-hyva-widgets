<?php

/**
 * Hyvä Themes - https://hyva.io
 * Copyright © Hyvä Themes 2020-present. All rights reserved.
 * See https://hyva.io/license
 */

declare(strict_types=1);

namespace Develo\HyvaWidgets\Block\Adminhtml;

use Develo\HyvaWidgets\Block\WidgetConfigs\Rows;

class DeveloFAQ extends Rows
{
    protected $rows = [
        'title' => [
            'label' => 'Title',
            'type' => 'text'
        ],
        'description' => [
            'label' => 'Description',
            'type' => 'textarea'
        ],
    ];
}
