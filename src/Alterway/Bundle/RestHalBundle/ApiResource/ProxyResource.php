<?php

namespace Alterway\Bundle\RestHalBundle\ApiResource;

use Alterway\Bundle\RestHalBundle\Renderer\ProxyRenderer;
use Nocarrier\Hal;

class ProxyResource extends Hal implements ProxyResourceInterface
{
    /**
     * Add an embedded resource, identified by $rel and represented by $resource.
     */
    public function addSingleResource(string $rel, ?Hal $resource = null): ProxyResource
    {
        $this->resources[$rel] = $resource;
        return $this;
    }

    /**
     * Return the current object in a application/hal+json format (links and resources)
     */
    public function asJson($pretty = false, $encode = true): array
    {
        $renderer = new ProxyRenderer();
        return $renderer->render($this, $pretty, $encode);
    }
}
