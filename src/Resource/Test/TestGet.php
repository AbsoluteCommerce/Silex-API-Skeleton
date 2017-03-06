<?php
namespace Acme\WebService\Resource\Test;

use Symfony\Component\HttpFoundation\Response;
use Absolute\SilexApi\Generation\Resource\Test\TestGetInterface;
use Absolute\SilexApi\Generation\Model\Message;
use Acme\WebService\Resource\ResourceAbstract;

class TestGet extends ResourceAbstract implements TestGetInterface
{
    /**
     * @inheritdoc
     */
    public function execute()
    {
        $this->httpResponse->setStatusCode(Response::HTTP_OK);

        return $this->modelFactory->get(Message::class, [
            'value' => 'Test GET Response',
        ]);
    }
}
