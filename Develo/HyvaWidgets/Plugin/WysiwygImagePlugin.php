<?php
/**
 * Hyvä Themes - https://hyva.io
 * Copyright © Hyvä Themes 2020-present. All rights reserved.
 * See https://hyva.io/license
 */

declare(strict_types=1);

namespace Develo\HyvaWidgets\Plugin;

use Magento\Cms\Helper\Wysiwyg\Images as WysiwygImageHelper;
use Magento\Cms\Block\Adminhtml\Wysiwyg\Images\Content as WysiwygImageContent;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\FileSystem;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Filesystem\Directory\ReadInterface as DirectoryRead;

class WysiwygImagePlugin
{
    /**
     * @var DirectoryRead
     */
    private $mediaDir;

    /**
     * @var RequestInterface
     */
    private $request;

    public function __construct(
        FileSystem $fileSystem,
        RequestInterface $request
    ) {
        $this->mediaDir = $fileSystem->getDirectoryRead(DirectoryList::MEDIA);
        $this->request  = $request;
    }

    /**
     * @param WysiwygImageHelper $subject
     * @param callable $proceed
     * @param string $filename
     * @param bool $renderAsTag
     * @return string
     * @throws LocalizedException
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function aroundGetImageHtmlDeclaration(
        WysiwygImageHelper $subject,
        callable $proceed,
        string $filename,
        $renderAsTag = false
    ) {
        if ($this->shouldResultBeRelativePath($renderAsTag)) {
            $absolutePath = $subject->getCurrentPath() . '/' . $filename;
            return $this->mediaDir->getRelativePath($absolutePath);
        }
        return $proceed($filename, $renderAsTag);
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function aroundGetOnInsertUrl(
        WysiwygImageContent $subject,
        callable $proceed
    ) {
        return $subject->getUrl(
            'cms/*/onInsert',
            ['widget' => $this->request->getParam('widget')]
        );
    }

    private function shouldResultBeRelativePath(bool $renderAsTag): bool
    {
        if (!$renderAsTag && $this->request->getParam('widget')) {
            return true;
        }
        return false;
    }
}
