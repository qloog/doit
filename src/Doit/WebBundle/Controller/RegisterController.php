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
                return new Response('password not equal');
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

            $user = $em->getRepository('DoitWebBundle:User')->findOneBy(array('email' => $userData['email']));
            if ($user) {
                $this->sendEmail('wql2008@vip.qq.com', '元宵节快乐！', '节日快乐哦！ 快乐开心每一天^_^');
                return $this->redirect($this->generateUrl('register_success'));
            }
        }
        return $this->render('DoitWebBundle:Register:index.html.twig');
    }

    /**
     * register success
     */
    public function successAction()
    {
        return $this->render('DoitWebBundle:Register:success.html.twig');
    }

    /**
     * send email to user
     */
    public function sendEmailAction(Request $request, $id, $hash)
    {

    }

    /**
     * verify email by active_code
     * http://beta.edusoho.com/register/email/verify/ajdhhpt0hog04skc4o84c8gwo8c488w
     */
    public function verifyEmailAction(Request $request, $token)
    {

    }

    /**
     * check email for form
     */
    public function checkEmailAction()
    {

    }

    public function updateAction($id)
    {
//        $id = $this->request->get('id');
        $em = $this->getDoctrine()->getEntityManager();
        $user = $em->getRepository('DoitWebBundle:User')->find($id);

        if (!$user) {
            throw $this->createNotFoundException('No product found for id '.$id);
        }

        $user->setUsername('New name!');
        $em->flush();

        return $this->redirect($this->generateUrl('register_success'));
    }

}
