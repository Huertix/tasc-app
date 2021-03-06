<?php

namespace AppBundle\Security;

use AppBundle\Form\LoginForm;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Core\Security;


class LoginFormAuthenticator extends AbstractFormLoginAuthenticator {

  private $formFactory;
  private $em;
  private $router;


  public function __construct(FormFactoryInterface $formFactory, EntityManager $em, RouterInterface $router) {
    $this->formFactory = $formFactory;
    $this->em = $em;
    $this->router = $router;
  }
  /**
   * Return the URL to the login page.
   *
   * @return string
   */
  protected function getLoginUrl() {
      return $this->router->generate('security_login');
  }

  /**
   * Get the authentication credentials from the request and return them
   * as any type (e.g. an associate array). If you return null, authentication
   * will be skipped.
   *
   * Whatever value you return here will be passed to getUser() and checkCredentials()
   *
   * For example, for a form login, you might:
   *
   *      if ($request->request->has('_username')) {
   *          return array(
   *              'username' => $request->request->get('_username'),
   *              'password' => $request->request->get('_password'),
   *          );
   *      } else {
   *          return;
   *      }
   *
   * Or for an API token that's on a header, you might use:
   *
   *      return array('api_key' => $request->headers->get('X-API-TOKEN'));
   *
   * @param Request $request
   *
   * @return mixed|null
   */
  public function getCredentials(Request $request) {
      $isLoginSubmit = $request->getPathInfo() == '/login' && $request->isMethod('POST');

      if (!$isLoginSubmit) {
        // skip authentication
        return;
      }

      $form = $this->formFactory->create(LoginForm::class);
      $form->handleRequest($request);

      $data = $form->getData();
      $request->getSession()->set(
        Security::LAST_USERNAME,
        $data['_username']
      );
      return $data;

  }

  /**
   * Return a UserInterface object based on the credentials.
   *
   * The *credentials* are the return value from getCredentials()
   *
   * You may throw an AuthenticationException if you wish. If you return
   * null, then a UsernameNotFoundException is thrown for you.
   *
   * @param mixed                 $credentials
   * @param UserProviderInterface $userProvider
   *
   * @throws AuthenticationException
   *
   * @return UserInterface|null
   */
  public function getUser($credentials, UserProviderInterface $userProvider) {

    $username = $credentials['_username'];

    return $this->em->getRepository('AppBundle:Vendedor')
      ->findOneBy(['nombre' => $username]);
  }

  /**
   * Returns true if the credentials are valid.
   *
   * If any value other than true is returned, authentication will
   * fail. You may also throw an AuthenticationException if you wish
   * to cause authentication to fail.
   *
   * The *credentials* are the return value from getCredentials()
   *
   * @param mixed         $credentials
   * @param UserInterface $user
   *
   * @return bool
   *
   * @throws AuthenticationException
   */
  public function checkCredentials($credentials, UserInterface $user) {
      $password = $credentials['_password'];

      if ($password == trim($user->getPassword())) {
        return true;
      }
      return false;
  }

  protected function getDefaultSuccessRedirectUrl() {
      return $this->router->generate('homepage');
  }

}
