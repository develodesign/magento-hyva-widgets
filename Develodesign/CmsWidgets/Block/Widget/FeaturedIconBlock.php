<?php

namespace Develodesign\CmsWidgets\Block\Widget;

use Magento\Widget\Block\BlockInterface;

class FeaturedIconBlock extends Multistep implements BlockInterface
{
    protected $_template = "widget/featurediconblock.phtml";

    public function getSteps()
    {
        return $this->getMultiFieldSteps();
    }
}
