<?php

namespace ZnBundle\Language\Yii2\Widgets\Language;

use yii\base\Widget;
use ZnBundle\Language\Domain\Filters\LanguageFilter;
use ZnBundle\Language\Domain\Interfaces\Services\LanguageServiceInterface;
use ZnBundle\Language\Domain\Interfaces\Services\RuntimeLanguageServiceInterface;

class LanguageWidget extends Widget
{

    public $baseUrl = '/language/current/switch';
    private $languageService;
    private $runtimeLanguageService;

    public function __construct(
        RuntimeLanguageServiceInterface $runtimeLanguageService,
        LanguageServiceInterface $languageService
    )
    {
        $this->languageService = $languageService;
        $this->runtimeLanguageService = $runtimeLanguageService;
    }

    public function run(): string
    {
        $dataProvider = $this->languageService->getDataProvider();
        $dataProvider->setFilterModel(new LanguageFilter());
        $collection = $dataProvider->getCollection();
        $language = $this->runtimeLanguageService->getLanguage();
        list($language) = explode('-', $language);
        return $this->render('index', [
            'collection' => $collection,
            'language' => $language,
            'baseUrl' => $this->baseUrl,
        ]);
    }
}
