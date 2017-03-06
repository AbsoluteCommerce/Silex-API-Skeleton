<?php
namespace Acme\WebService\Resource\Customer;

use Absolute\SilexApi\Generation\Resource\Customer\CustomerGetInterface;
use Absolute\SilexApi\Resource\ResourceAbstract;
use Absolute\SilexApi\Generation\Model\Customer;

class CustomerGet extends ResourceAbstract implements CustomerGetInterface
{
    /* @param string $customerId */
    private $customerId;

    /**
     * @inheritdoc
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    /**
     * @inheritdoc
     */
    public function execute()
    {
        return $this->modelFactory->get(Customer::class, [
            'id' => $this->customerId,
        ]);
    }
}
