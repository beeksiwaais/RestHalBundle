<?php

namespace Alterway\Bundle\RestHalBundle\Renderer;

use Nocarrier\HalJsonRenderer;
use Nocarrier\Hal;

class ProxyRenderer extends HalJsonRenderer
{
    /**
     * Return an array (compatible with the hal+json format) representing associated resources
     *
     * @param mixed $resources
     * @return array
     */
    protected function resourcesForJson($resources)
    {
        if(!is_array($resources)) {
            return $this->arrayForJson($resources);

        }

        return parent::resourcesForJson($resources);
    }

    /**
     * @inheritdoc
     */
    protected function arrayForJson(Hal $resource = null)
    {
        if ($resource == null) {
            return array();
        }
        $data = $resource->getData();
        $data = $this->stripAttributeMarker($data);
        if ($resource->getUri()) {
            $data['_links'] = $this->linksForJson($resource->getUri(), $resource->getLinks());
        }
        foreach($resource->getResources() as $rel => $resources) {
            $data[$rel] = $this->resourcesForJson($resources);
        }
        return $data;
    }
}
