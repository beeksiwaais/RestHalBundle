<?php

namespace Alterway\Bundle\RestHalBundle\Controller\Annotations;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationInterface;

/**
 * @Annotation
 */
class Hal implements ConfigurationInterface
{
    public int $code = 200;

    public function getAliasName(): string
    {
        return 'hal_config';
    }

    public function allowArray(): bool
    {
        return false;
    }
}
