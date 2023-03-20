<?php

declare(strict_types=1);

namespace Develodesign\HyvaCmsWidgets\Block\Widget\Adminhtml;

use Develodesign\HyvaCmsWidgets\Block\Widget\WidgetConfigs\Rows;

class FeaturedImageMultistep extends Rows
{
    protected $rows = [
        'image' => [
            'label' => 'Image',
            'type' => 'image'
        ],
        'imagealt' => [
            'label' => 'Image alt attr',
            'type' => 'text'
        ],
        'line' => [
            'label' => 'Line Colour',
            'type' => 'text'
        ],
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
