<?php

namespace Alterway\Bundle\RestHalBundle\Response;

use Alterway\Bundle\RestHalBundle\ApiResource\ResourceInterface;

interface HalResponseInterface
{
    public function getResource(): ResourceInterface;
}
