<?php

namespace ipezbo\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ipezboUserBundle extends Bundle
{

    public function getParent()
    {
        return 'FOSUserBundle';
    }

}
