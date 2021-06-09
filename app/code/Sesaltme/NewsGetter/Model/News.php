<?php
namespace Sesaltme\NewsGetter\Model;

class News extends \Magento\Framework\Model\AbstractModel
{
    const REQUEST_TIMEOUT = 5000;

    const BUSINESS = 'business';

    const NEWS_API = [
        self::BUSINESS => 'https://vnexpress.net/rss/kinh-doanh.rss',
    ];

    private $response;
    
    /**
     * @var \Magento\Framework\HTTP\Client\CurlFactory
     */
    private $curlFactory;
    
    /**
     * @var \Magento\Framework\Xml\Parser
     */
    private $xmlParser;

    /**
     * @param \Magento\Framework\HTTP\Client\CurlFactory $curlFactory
     * @param \Magento\Framework\Xml\Parser $jsonHelper
     */
    public function __construct(
        \Magento\Framework\HTTP\Client\CurlFactory $curlFactory,
        \Magento\Framework\Xml\Parser $xmlParser
    )
    {
        $this->curlFactory = $curlFactory;
        $this->xmlParser = $xmlParser;
    }

    public function getArticles(String $type)
    {
        if(!$this->response){
            $this->response = (object) $this->xmlParser->loadXML($this->getResponse($type))->xmlToArray();
        }
        
        return $this->response;
    }

    private function getResponse(String $type)
    {
        /** @var \Magento\Framework\HTTP\Client\Curl $client */
        $client = $this->curlFactory->create();
        $client->setTimeout(self::REQUEST_TIMEOUT);
        $client->get(self::NEWS_API[$type]);
        
        return $client->getBody();
    }
}
