<?php

namespace ZnBundle\Language\Yii2\Admin\Controllers;

use Packages\Library\Domain\Enums\Rbac\LibraryBookPermissionEnum;
use yii\filters\AccessControl;
use yii\helpers\Url;
use ZnBundle\Language\Domain\Entities\LanguageEntity;
use ZnBundle\Language\Domain\Enums\Rbac\LanguagePermissionEnum;
use ZnBundle\Language\Domain\Interfaces\Services\LanguageServiceInterface;
use ZnBundle\Language\Yii2\Admin\Forms\LanguageForm;
use ZnBundle\Language\Yii2\Admin\Module;
use ZnBundle\Notify\Domain\Interfaces\Services\ToastrServiceInterface;
use ZnLib\I18Next\Facades\I18Next;
use ZnLib\Web\TwBootstrap\Widgets\Breadcrumb\BreadcrumbWidget;
use ZnYii\Web\Controllers\BaseController;

class LanguageController extends BaseController
{

    protected $baseUri = '/language/language';
    protected $formClass = LanguageForm::class;
    protected $entityClass = LanguageEntity::class;

    private $toastrService;

    public function __construct(
        string $id,
        Module $module,
        BreadcrumbWidget $breadcrumbWidget,
        LanguageServiceInterface $service,
        ToastrServiceInterface $toastrService,
        array $config = []
    )
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
        $this->toastrService = $toastrService;
        $this->breadcrumbWidget = $breadcrumbWidget;
        $this->breadcrumbWidget->add(I18Next::t('library', 'book.title'), Url::to([$this->baseUri]));
    }

    public function actions()
    {
        $actions = parent::actions();
        $actions['restore'] = $this->getRestoreActionConfig();
        return $actions;
    }

    public function behaviors()
    {
        return [
            //'authenticator' => Behavior::auth(),
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [LanguagePermissionEnum::ALL],
                        'actions' => ['index'],
                    ],
                    [
                        'allow' => true,
                        'roles' => [LanguagePermissionEnum::ONE],
                        'actions' => ['view'],
                    ],
                    [
                        'allow' => true,
                        'roles' => [LanguagePermissionEnum::CREATE],
                        'actions' => ['create'],
                    ],
                    [
                        'allow' => true,
                        'roles' => [LanguagePermissionEnum::UPDATE],
                        'actions' => ['update'],
                    ],
                    [
                        'allow' => true,
                        'roles' => [LanguagePermissionEnum::DELETE],
                        'actions' => ['delete'],
                    ],
                    [
                        'allow' => true,
                        'roles' => [LanguagePermissionEnum::RESTORE],
                        'actions' => ['restore'],
                    ],
                ],
            ],
        ];
    }

//    public function with()
//    {
//        return [
//            'publisher',
//            'subject',
//        ];
//    }
}
