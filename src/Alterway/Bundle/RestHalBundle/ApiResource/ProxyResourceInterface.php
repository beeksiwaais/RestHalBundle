<?php

namespace Alterway\Bundle\RestHalBundle\ApiResource;

interface ProxyResourceInterface
{
    /**
     * Add an embedded resource, identified by $rel and represented by $resource.
     */
    public function addSingleResource(string $rel, ?Hal $resource = null): ProxyResource;
    /**
     * Return the current object in a application/hal+json format (links and resources)
     */
    public function asJson($pretty = false, $encode = true): array;
}
