<?php

namespace ZnBundle\Language;

use ZnCore\Base\Libs\App\Base\BaseBundle;

class BundleNew extends Bundle
{

    public function container(): array
    {
        return [
            __DIR__ . '/Domain/config/container-new.php',
        ];
    }
}
