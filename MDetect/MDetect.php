<?php

/*
 * This file is part of the TeckHouseMDetectBundle package.
 *
 * (c) TeckHouse <http://www.teckouse.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TeckHouse\MDetectBundle\MDetect;

require_once __DIR__.'/../Lib/mdetect.php';

/**
 * @author Mauro Foti <m.foti@teckhouse.com>
 */
class MDetect {
    
    protected $uagent;

    public function __construct() 
    {
        $this->uagent = new \uagent_info();;
    }
    
    public function getUAgent()
    {
        return $this->uagent;
    }
    
    public function isMobile()
    {
        return $this->uagent->DetectMobileQuick();
    }
    
    public function isTablet()
    {
        return $this->isMobile() ? $this->uagent->DetectTierTablet() : false;
    }
    
    public function detectDevice()
    {
        $device = null;
        
        if ($this->isMobile()) {
		$device = 'mobile';
	} elseif ($this->isTablet()) {
		$device = 'tablet';
	} else {
		$device = 'desk';
	} 
        
        return $device;
    }
    
}

?>
