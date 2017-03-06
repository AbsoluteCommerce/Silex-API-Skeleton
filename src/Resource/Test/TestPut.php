<?php
namespace Acme\WebService\Resource\Test;

use Symfony\Component\HttpFoundation\Response;
use Absolute\SilexApi\Generation\Resource\Test\TestPutInterface;
use Absolute\SilexApi\Generation\Model\Message;
use Acme\WebService\Resource\ResourceAbstract;

class TestPut extends ResourceAbstract implements TestPutInterface
{
    /**
     * @inheritdoc
     */
    public function execute()
    {
        $this->httpResponse->setStatusCode(Response::HTTP_OK);

        return $this->modelFactory->get(Message::class, [
            'value' => 'Test PUT Response',
        ]);
    }
}
