<?php
namespace Sesaltme\NewsGetter\Block;

use Sesaltme\NewsGetter\Model\News as NewsModel;

class News extends \Magento\Framework\View\Element\Template
{
    protected $messageManager;

    private $newsFactory;
    private $model;
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Sesaltme\NewsGetter\Model\NewsFactory $newsFactory,
     * @param \Magento\Framework\Message\ManagerInterface $messageManager,
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Sesaltme\NewsGetter\Model\NewsFactory $newsFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->newsFactory = $newsFactory;
        $this->createModel();
    }

    public function getArticles(String $type)
    {
        return $this->model->getArticles($type);
    }
    
    private function createModel()
    {
        if (!$this->model) {
            $this->model = $this->newsFactory->create();
        }
    }
}
