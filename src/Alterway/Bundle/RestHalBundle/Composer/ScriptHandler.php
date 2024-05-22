<?php

namespace Alterway\Bundle\RestHalBundle\Composer;

use Composer\Script\Event;

class ScriptHandler
{
    public static function registerLoader(Event $event)
    {
        $autoloadFile = __DIR__ . '/../../../../vendor/autoload.php';
        $loaderLine = "Doctrine\\Common\\Annotations\\AnnotationRegistry::registerLoader(array(\$loader, 'loadClass'));";

        if (file_exists($autoloadFile) && is_writable($autoloadFile)) {
            $content = file_get_contents($autoloadFile);
            if (strpos($content, $loaderLine) === false) {
                file_put_contents($autoloadFile, $content . PHP_EOL . $loaderLine . PHP_EOL);
                $event->getIO()->write("Updated autoload.php with AnnotationRegistry loader.");
            } else {
                $event->getIO()->write("AnnotationRegistry loader already registered.");
            }
        } else {
            $event->getIO()->write("Cannot modify autoload.php, file not found or not writable.");
        }
    }
}