<?php

namespace ZnBundle\Language\Yii2\Web\Controllers;

use Yii;
use yii\base\Module;
use yii\filters\VerbFilter;
use yii\web\Controller;
use ZnBundle\Language\Domain\Interfaces\Services\LanguageServiceInterface;
use ZnBundle\Language\Domain\Interfaces\Services\RuntimeLanguageServiceInterface;
use ZnCore\Base\Libs\I18Next\Facades\I18Next;
use ZnLib\Web\Yii2\Widgets\Toastr\widgets\Alert;

class CurrentController extends Controller
{

    private $service;

    public function __construct(
        string $id,
        Module $module, array $config = [],
        RuntimeLanguageServiceInterface $service
    )
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }

    public function behaviors()
    {
        return [
            [
                'class' => VerbFilter::class,
                'actions' => [
                    'switch' => ['POST'],
                ],
            ],
            /*'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [SupportCallMePermissionEnum::CREATE],
                        'actions' => ['switch'],
                    ],
                ],
            ],*/
        ];
    }


    public function actionSwitch()
    {
        if (Yii::$app->request->isPost) {
            $locale = Yii::$app->request->getQueryParam('locale');
            $this->service->setLanguage($locale);
            Alert::create(I18Next::t('language', 'language.message.switch_success'), Alert::TYPE_SUCCESS);
        }
        return $this->redirect(Yii::$app->request->referrer);
    }
}
