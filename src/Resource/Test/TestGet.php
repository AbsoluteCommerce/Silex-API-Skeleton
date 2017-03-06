<?php
namespace Acme\WebService\Resource\Test;

use Symfony\Component\HttpFoundation\Response;
use Absolute\SilexApi\Resource\ResourceAbstract;
use Absolute\SilexApi\Generation\Resource\Test\TestGetInterface;
use Absolute\SilexApi\Generation\Model\Message;

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
