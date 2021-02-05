<?php

namespace ZnBundle\Language\Yii2\Web\Controllers;

use Yii;
use yii\base\Module;
use yii\filters\VerbFilter;
use yii\web\Controller;
use ZnBundle\Language\Domain\Interfaces\Services\RuntimeLanguageServiceInterface;
use ZnBundle\Notify\Domain\Interfaces\Services\ToastrServiceInterface;
use ZnCore\Base\Libs\I18Next\Facades\I18Next;

class CurrentController extends Controller
{

    private $service;
    private $toastrService;

    public function __construct(
        string $id,
        Module $module, array $config = [],
        RuntimeLanguageServiceInterface $service,
        ToastrServiceInterface $toastrService
    )
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
        $this->toastrService = $toastrService;
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
            $this->toastrService->success(I18Next::t('language', 'language.message.switch_success'));
        }
        return $this->redirect(Yii::$app->request->referrer);
    }
}
