<?php

namespace ZnBundle\Language\Yii2\Admin\Forms;

use ZnYii\Base\Forms\BaseForm;

class LanguageForm extends BaseForm
{

    public $code = null;
    public $title = null;
    public $name = null;
    public $locale = null;
    public $isMain = null;
    public $isEnabled = null;
    
    public function i18NextConfig(): array
    {
        return [
            'bundle' => 'language',
            'file' => 'language',
        ];
    }
}
