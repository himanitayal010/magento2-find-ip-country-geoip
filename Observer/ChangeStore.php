<?php 

namespace Magneto\ChangeStore\Observer;

use Magento\Framework\Event\ObserverInterface;

class ChangeStore implements ObserverInterface
{
   	protected $logger;

    protected $objectManager;

    protected $_curl;

    public function __construct(
    \Psr\Log\LoggerInterface $logger, 
    \Magento\Framework\ObjectManagerInterface $objectManager,
    \Magento\Framework\HTTP\Client\Curl $curl,
	\Magento\Store\Model\StoreManagerInterface $storeManagerInterface) {
        $this->logger = $logger;
        $this->_curl = $curl;
        $this->objectManager = $objectManager;
        $this->_storeManagerInterface = $storeManagerInterface;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
   	{
   		if($this->getCountryCode() == 'IN'){
   			$this->_storeManagerInterface->setCurrentStore(1);
   		}else{
   			$this->_storeManagerInterface->setCurrentStore(2);
   		}

   	}

    public function getCountryCode() {
        $visitorIp = $this->getVisitorIp();
        // $visitorIp = '198.7.59.119';  //Test US IP
        $visitorIp = '103.120.178.71'; //Test India IP
        $url = "http://api.ipstack.com/".$visitorIp."?access_key=4af3fcb2c243eb3135772d194aed1788&format=1";
        $this->_curl->get($url);
        $response = json_decode($this->_curl->getBody(), true);
        $countryCode = $response['country_code'];
       	return $countryCode;        
    }

    function getVisitorIp() {       
        $remoteAddress = $this->objectManager->create('Magento\Framework\HTTP\PhpEnvironment\RemoteAddress');
        return $remoteAddress->getRemoteAddress();
    }

}