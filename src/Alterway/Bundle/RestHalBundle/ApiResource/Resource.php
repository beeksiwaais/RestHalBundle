<?php

namespace Alterway\Bundle\RestHalBundle\ApiResource;

use Symfony\Component\Routing\RouterInterface;

abstract class Resource implements ResourceInterface
{
    public function __construct(
        protected RouterInterface $router,
        protected ProxyResourceInterface $hal,
    ) {
    }

    public function addLink($rel, $route, array $routeParams = array(), array $attributes = array()): self
    {
        $generatedRoute = $this->generate($route, $routeParams);
        $this->hal->addLink(
            $rel,
            $generatedRoute,
            $attributes
        );

        return $this;
    }

    public function addResource($rel, ?ResourceInterface $resource = null): self
    {
        $hal = $resource ? $resource->getHal(): null;
        $this->hal->addResource($rel, $hal);
        return $this;
    }

    public function addSingleResource($rel, ?ResourceInterface $resource = null): self
    {
        $this->hal->addSingleResource($rel, $resource->getHal());
        return $this;
    }


    public function setData(array $data): self
    {
        $this->hal->setData($data);
        return $this;
    }

    public function setUri($uri): self
    {
        $this->hal->setUri($uri);
        return $this;
    }

    public function asJson($pretty = false)
    {
        return $this->getHal()->asJson($pretty);
    }

    public function getHal()
    {
        $this->prepare();
        $this->setUri($this->generateUri());
        return $this->hal;
    }

    public function generate($title, $params)
    {
        return $this->router->generate($title, $params);
    }

    abstract protected function prepare();
    abstract protected function generateUri();
}
