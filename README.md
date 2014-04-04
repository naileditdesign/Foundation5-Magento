Foundation 5 Magento Boiler Plate
===================================

Nailed it Designs Foundation 5 Magento Boiler Plate

License Information, credits and Links

Zurbs Foundation (http://foundation.zurb.com/)  - Releases MIT Licence and is copyright to Zurb

Twitter’s Bootstrap (http://getbootstrap.com/) - Apache 2 license and is copyright  Twitter

Nailed it Designs Foundation 5 Magento Boiler Plate  (any code added to extend either Foundation)  (http://naileditdesign.com) – Is released under a GPL licence


NOTICE LOCAL HOST VERSION::

This version is Magento 1.8.1 and is ready to deploy locally (localhost)

This means we have edited this core file app/code/core/Mage/Core/Model/Session/Abstract/Varien.php

$cookieParams = array(
            'lifetime' => $cookie->getLifetime(),
            'path'     => $cookie->getPath(),
            // 'domain'   => $cookie->getConfigDomain(),
            // 'secure'   => $cookie->isSecure(),
            // 'httponly' => $cookie->getHttponly()
        );

If you are deploying these files on a server environ ment PLEASE REVERSE THESE CHANGES


I Thank You!
