<?php

namespace Develodesign\HyvaCmsWidgets\Controller\Index;

use Magento\Framework\Exception\FileSystemException;

class Forcedownload extends \Magento\Framework\App\Action\Action
{

    /**
     * @var Magento\Framework\App\Response\Http\FileFactory
     */
    protected $_downloader;

    /**
     * @var Magento\Framework\Filesystem\DirectoryList
     */
    protected $_directory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\App\Response\Http\FileFactory $fileFactory,
        \Magento\Framework\Filesystem\DirectoryList $directory
    )
    {

        $this->_downloader = $fileFactory;
        $this->directory = $directory;

        parent::__construct($context);

    }
    
    /**
     * @throws FileSystemException
     * @throws \Exception
     */
    public function execute()
    {
        $filepath = "bom/bom_example.csv";
        $filename = "bom_example.csv";
        $file = $this->directory->getPath( 'media' ) . '/' . $filepath;
        return $this->_downloader->create(
            $filename,
            @file_get_contents($file)
        );
    }

}
