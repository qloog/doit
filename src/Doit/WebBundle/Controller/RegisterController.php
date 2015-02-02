<?php

namespace Doit\WebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doit\WebBundle\Entity\User;
use \DateTime;

class RegisterController extends BaseController
{

    /**
     * register home page
     */
    public function indexAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $userData = array();
            $userData['email'] = $request->get('email');
            $userData['username'] = $request->get('username');
            $userData['password'] = $request->get('password');
            $userData['rePassword'] = $request->get('repassword');
            if ($userData['password'] != $userData['rePassword']) {
                $this->get('session')->getFlashBag()->set('error', 'password not equal');
                return $this->redirect($this->generateUrl('register'));
            }
            $userData['register_ip'] = $request->getClientIp();

            $em = $this->getDoctrine()->getManager();
            $user = new User();
            $user->setEmail($userData['email']);
            $user->setUsername($userData['username']);
            $user->setPassword($userData['password']);
            $user->setRegisterTime(new DateTime());
            $user->setRegisterIp($userData['register_ip']);
            $user->setActivateCode('111111111');
            $user->setActivateExpire(new DateTime());
            $user->setLastLoginTime(new DateTime());
            $user->setLastLoginIp('');
            $user->setLoginTimes(0);
            $user->setUpdateTime(new DateTime());
            $user->setStatus(0);

            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('register_success'));
        }
        return $this->render('DoitWebBundle:Register:index.html.twig');

    }

    /**
     * register success
     */
    public function successAction()
    {
        echo 'success';exit;

    }

    /**
     * send email to user
     */
    public function sendEmailAction()
    {

    }

    /**
     * verify email by active_code
     */
    public function verifyEmailAction()
    {

    }

    /**
     * check email for form
     */
    public function checkEmailAction()
    {

    }



}
