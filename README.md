# Installation

## Add TeckHouseMDetectBundle in your composer.json:

```
{
    "require": {
        "teckhouse/mdetect-bundle": "dev-master"
    }
}
```

## Install the bundle with composer:

```
$ php composer.phar update teckhouse/mdetect-bundle
```

## Enable the bundle

```
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        
        // Yours bundles
        // [...] 

        // Mobile Detect Bundle
        new TeckHouse\MDetectBundle\TeckHouseMDetectBundle(),
    );
}
```

# Configure

there is only one parameter :) 

in config.yml:

```
teckhouse_mdetect:
    inject_in_request: [ true | false ]
```

# Usage

if the injection in request is setted to true you will find the var "$userDeviceType" in request parameters bug that indentify the device type: "mobile", "tablet", "desk".

To get the value simple do this:

```
$request->server->get("userDeviceType");
```

If the injection is setted to "off" you can use the service to get infos about the device:

```
$this->get('teckhouse_mdetect.wrapper');
```