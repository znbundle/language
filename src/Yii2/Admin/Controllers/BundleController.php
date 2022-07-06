<?php

namespace ZnBundle\Language\Yii2\Admin\Controllers;

use Yii;
use yii\base\Module;
use yii\filters\VerbFilter;
use yii\web\Controller;
use ZnBundle\Language\Domain\Entities\BundleEntity;
use ZnBundle\Language\Domain\Filters\BundleFilter;
use ZnBundle\Language\Domain\Interfaces\Services\BundleServiceInterface;
use ZnBundle\Language\Domain\Interfaces\Services\RuntimeLanguageServiceInterface;
use ZnBundle\Notify\Domain\Interfaces\Services\ToastrServiceInterface;
use ZnBundle\Storage\Domain\Entities\FileEntity;
use ZnBundle\Storage\Domain\Filters\FileFilter;
use ZnBundle\Storage\Yii2\Web\Forms\FileForm;
use ZnLib\I18Next\Facades\I18Next;
use ZnLib\Web\TwBootstrap\Widgets\Breadcrumb\BreadcrumbWidget;
use ZnYii\Web\Controllers\BaseController;

class BundleController extends BaseController
{

    protected $service;
    private $toastrService;

    /*protected $baseUri = '/storage/file';
    protected $formClass = FileForm::class;
    protected $entityClass = BundleEntity::class;
    protected $filterModel = BundleFilter::class;*/

    public function __construct(
        string $id,
        Module $module, array $config = [],
        BundleServiceInterface $service,
        ToastrServiceInterface $toastrService,
        BreadcrumbWidget $breadcrumbWidget
    )
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
        $this->toastrService = $toastrService;
        $this->breadcrumbWidget = $breadcrumbWidget;
    }

    public function behaviors()
    {
        return [
            /*[
                'class' => VerbFilter::class,
                'actions' => [
                    'switch' => ['POST'],
                ],
            ],
            'access' => [
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

    public function actionIndex1()
    {
        dd(23423);
        if (Yii::$app->request->isPost) {
            $locale = Yii::$app->request->getQueryParam('locale');
            $this->service->setLanguage($locale);
            $this->toastrService->success(I18Next::t('language', 'language.message.switch_success'));
        }
        return $this->redirect(Yii::$app->request->referrer);
    }
}
