<?php

/**
 * Hyvä Themes - https://hyva.io
 * Copyright © Hyvä Themes 2020-present. All rights reserved.
 * See https://hyva.io/license
 */

declare(strict_types=1);

namespace Develodesign\HyvaCmsWidgets\Block\Widget\Adminhtml;

use Develodesign\HyvaCmsWidgets\Block\Widget\WidgetConfigs\Rows;

class Faq extends Rows
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