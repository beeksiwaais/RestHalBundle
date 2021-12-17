<?php

namespace Alterway\Bundle\RestHalBundle\Response;

use Alterway\Bundle\RestHalBundle\ApiResource\ResourceInterface;
use Symfony\Component\HttpFoundation\Response;

class HalResponse extends Response implements HalResponseInterface
{
    private ResourceInterface $resource;

    public function __construct(ResourceInterface $resource, $status = 200)
    {
        parent::__construct($resource->asJson(), $status, array(
            'Content-Type' => 'application/hal+json',
        ));

        $this->resource = $resource;
    }

    public function getResource(): ResourceInterface
    {
        return $this->resource;
    }
}