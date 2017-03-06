<?php
namespace Acme\WebService\Resource\Home;

use Symfony\Component\HttpFoundation\Response;
use Absolute\SilexApi\Resource\ResourceAbstract;
use Absolute\SilexApi\Generation\Resource\Home\HomeInterface;
use Absolute\SilexApi\Generation\Model\Message;

class Home extends ResourceAbstract implements HomeInterface
{
    /**
     * @inheritdoc
     */
    public function execute()
    {
        $this->httpResponse->setStatusCode(Response::HTTP_OK);
        
        return $this->modelFactory->get(Message::class, [
            'value' => 'Welcome to the Acme WebService!',
        ]);
    }
}
