<?php
namespace Acme\WebService\Resource\Test;

use Symfony\Component\HttpFoundation\Response;
use Absolute\SilexApi\Resource\ResourceAbstract;
use Absolute\SilexApi\Generation\Resource\Test\TestPostInterface;
use Absolute\SilexApi\Generation\Model\Message;

class TestPost extends ResourceAbstract implements TestPostInterface
{
    /**
     * @inheritdoc
     */
    public function execute()
    {
        $this->httpResponse->setStatusCode(Response::HTTP_OK);

        return $this->modelFactory->get(Message::class, [
            'value' => 'Test POST Response',
        ]);
    }
}
