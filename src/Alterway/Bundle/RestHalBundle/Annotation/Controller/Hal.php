<?php

namespace Alterway\Bundle\RestHalBundle\Controller\Annotations;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD)]
final class Hal
{
    public function __construct(
        int $code = 200
    ) {
    }

    public function getAliasName(): string
    {
        return 'hal_config';
    }

    public function allowArray(): bool
    {
        return false;
    }
}