<?php

namespace Alterway\DemoBundle\ApiResource;

use Alterway\Bundle\RestHalBundle\ApiResource\Resource;
use Alterway\DemoBundle\Entity\User;
use Symfony\Component\Routing\RouterInterface;

class UserResource extends Resource
{
    private User $user;

    public function __construct(RouterInterface $router, User $user)
    {
        parent::__construct($router);
        $this->user = $user;
    }

    protected function prepare()
    {
        $this->addLink('detail', 'demo.user.detail', array('id' => $this->user->getId()));
        $this->addLink('search', 'demo.user.search', array('id' => $this->user->getId()));
    }

    protected function generateUri()
    {
        return $this->router->generate('demo.user', array('id' => $this->user->getId()));
    }
}
