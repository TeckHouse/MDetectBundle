<?php

/*
 * This file is part of the TeckHouseMDetectBundle package.
 *
 * (c) TeckHouse <http://www.teckouse.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TeckHouse\MDetectBundle\EventListener;

use TeckHouse\MDetectBundle\MDetect\MDetect;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;

/**
 * @author Mauro Foti <m.foti@teckhouse.com>
 */
class RequestListener {
    
    protected $mdetect;

    public function __construct(MDetect $mdetect) {
        
        $this->mdetect = $mdetect;
    }
    
    public function setDeviceType(GetResponseEvent $event) {
        
        if (HttpKernel::MASTER_REQUEST == $event->getRequestType()) {
            
            $request = $event->getRequest();
            $deviceType = $this->mdetect->detectDevice();
            
            $request->server->set("userDeviceType", $deviceType);
            
            return;
        }
    }
}

?>
