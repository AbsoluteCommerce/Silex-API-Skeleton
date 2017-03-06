<?php
namespace Acme\WebService\Resource\Test;

use Symfony\Component\HttpFoundation\Response;
use Absolute\SilexApi\Generation\Resource\Test\TestPatchInterface;
use Absolute\SilexApi\Generation\Model\Message;
use Acme\WebService\Resource\ResourceAbstract;

class TestPatch extends ResourceAbstract implements TestPatchInterface
{
    /**
     * @inheritdoc
     */
    public function execute()
    {
        $this->httpResponse->setStatusCode(Response::HTTP_OK);

        return $this->modelFactory->get(Message::class, [
            'value' => 'Test PATCH Response',
        ]);
    }
}
