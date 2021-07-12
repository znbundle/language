<?php

namespace ZnBundle\Language\Symfony4\Web\Controllers;

use App\User\Domain\Enums\Rbac\AppUserPermissionEnum;
use ZnBundle\Language\Domain\Interfaces\Services\RuntimeLanguageServiceInterface;
use ZnBundle\Language\Symfony4\Web\Enums\WebUserEnum;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use ZnBundle\Notify\Domain\Interfaces\Services\ToastrServiceInterface;
use ZnBundle\Summary\Domain\Exceptions\AttemptsBlockedException;
use ZnBundle\Summary\Domain\Exceptions\AttemptsExhaustedException;
use ZnBundle\User\Domain\Forms\AuthForm;
use ZnBundle\User\Domain\Interfaces\Services\AuthServiceInterface;
use ZnCore\Base\Libs\I18Next\Facades\I18Next;
use ZnCore\Domain\Exceptions\UnprocessibleEntityException;
use ZnLib\Web\Symfony4\MicroApp\BaseWebController;
use ZnLib\Web\Symfony4\MicroApp\Interfaces\ControllerAccessInterface;
use ZnLib\Web\Symfony4\MicroApp\Traits\ControllerFormTrait;

class CurrentController extends BaseWebController implements ControllerAccessInterface
{

    use ControllerFormTrait;

    protected $viewsDir = __DIR__ . '/../views/auth';
    protected $authService;
    protected $toastrService;
    protected $session;
    private $service;

    public function __construct(
        FormFactoryInterface $formFactory,
        CsrfTokenManagerInterface $tokenManager,

        RuntimeLanguageServiceInterface $service,

        ToastrServiceInterface $toastrService,
        AuthServiceInterface $authService,
        SessionInterface $session
    )
    {
        $this->setFormFactory($formFactory);
        $this->setTokenManager($tokenManager);
        $this->authService = $authService;
        $this->toastrService = $toastrService;
        $this->session = $session;
        $this->service = $service;
    }

    public function access(): array
    {
        return [
            'switch' => [
                AppUserPermissionEnum::AUTHENTICATION_WEB_LOGIN,
            ],
            /*'logout' => [
                AppUserPermissionEnum::AUTHENTICATION_WEB_LOGOUT,
            ],*/
        ];
    }

    public function switch(Request $request): Response
    {
        $locale = $request->get('locale');
//        dd($locale);
        $this->service->setLanguage($locale);
        $this->toastrService->success(I18Next::t('language', 'language.message.switch_success'));
        return $this->redirectToBack($request);
    }

}
