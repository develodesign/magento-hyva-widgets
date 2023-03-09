<?php

namespace Develodesign\CmsWidgets\Block\Widget;

use Magento\Widget\Block\BlockInterface;

class FeaturedImageBlock extends Multistep implements BlockInterface
{
    protected $_template = "widget/featuredimageblock.phtml";

    public function getSteps()
    {
        return $this->getMultiFieldSteps();
    }
}
