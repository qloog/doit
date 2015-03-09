<?php
/**
 * 登录
 * 
 * @filename: LoginController.php
 * @author: qloog
 * @date: 15/3/6 20:00
 */

namespace Doit\WebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Doit\WebBundle\Entity\User;

class LoginController extends BaseController
{


    public function indexAction(Request $request)
    {

        /* @var $session \Symfony\Component\HttpFoundation\Session\Session */
        $session =  $request->getSession();

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContextInterface::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        } else {
            $error = null;
        }

        if (!$error instanceof AuthenticationException) {
            $error = null; // The value does not come from the security component.
        }

        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContextInterface::LAST_USERNAME);

//        $csrfToken = $this->has('form.csrf_provider')
//            ? $this->get('form.csrf_provider')->generateCsrfToken('authenticate')
//            : null;
        return $this->renderLogin(array(
                'last_username' => $lastUsername,
                'error'         => $error,
                //'csrf_token' => $csrfToken,
            ));
    }

    /**
     * Renders the login template with the given parameters. Overwrite this function in
     * an extended controller to provide additional data for the login template.
     *
     * @param array $data
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function renderLogin(array $data)
    {
        return $this->render('DoitWebBundle:Login:index.html.twig', $data);
    }

    public function loginCheckAction(Request $request)
    {
        $username = $request->get('_username');
        $password = $request->get('_password');

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('Doit\WebBundle:User')->findUserByUsername($username);
        if(!$user){
            $user = $em->findUserByEmail($username);
        }

        if(!$user instanceof User){
            throw new NotFoundHttpException("User not found");
        }
//        if(!$this->checkUserPassword($user, $password)){
//            throw new AccessDeniedException("Wrong password");
//        }

        $security = $this->get('security.context');
        $providerKey = $this->container->getParameter('security.main');
        $roles = $user->getRoles();
        $token = new UsernamePasswordToken($user, null, $providerKey, $roles);
        $security->setToken($token);
        return array('success'=>true, 'user'=>$user);
    }

    protected function checkUserPassword(User $user, $password)
    {
        $factory = $this->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);
        if(!$encoder){
            return false;
        }
        return $encoder->isPasswordValid($user->getPassword(), $password, $user->getSalt());
    }

    public function logoutAction(Request $request)
    {

    }
}

