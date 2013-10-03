<?php

namespace TeckHouse\MDetectBundle\Twig;

use TeckHouse\MDetectBundle\MDetect\MDetect;

class DeviceDetectExtension extends \Twig_Extension
{
    
    private $deviceType;
    
    public function __construct(MDetect $deviceDetector)
    {
        $this->deviceType = $deviceDetector->detectDevice();
    }
    public function getFunctions() {
        return array(
            'getDeviceType' => new \Twig_Function_Method($this, 'getDeviceType'),
        );
    }

    public function getDeviceType()
    {

        return $this->deviceType;

    }

    public function getName()
    {
        return 'detect_device_extension';
    }
}