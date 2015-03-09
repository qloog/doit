<?php

namespace Doit\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{

    /**
     * 发送邮件
     * @param   string  $to
     * @param   string  $title
     * @param   string  $body   支持html, 可以直接传入：$this->render('MyBundle:Register:success.html.twig', array('name' => 'test1'))
     * @param   string  $format
     * @return bool
     */
    protected function sendEmail($to, $title, $body, $format = 'text')
    {
        $format == 'html' ? 'text/html' : 'text/plain';

        $host = $this->container->getParameter('mailer_host');
        $port = $this->container->getParameter('mailer_port');
        $username = $this->container->getParameter('mailer_user');
        $password = $this->container->getParameter('mailer_password');
        $from = $this->container->getParameter('mailer_from');
        $name = $this->container->getParameter('mailer_name');

        $transport = \Swift_SmtpTransport::newInstance($host, $port)
            ->setUsername($username)
            ->setPassword($password);

        $mailer = \Swift_Mailer::newInstance($transport);

        $email = \Swift_Message::newInstance();
        $email->setSubject($title);
        $email->setFrom(array ($from => $name ));
        $email->setTo($to);
        if ($format == 'text/html') {
            $email->setBody($body, 'text/html');
        } else {
            $email->setBody($body);
        }

        $mailer->send($email);

        return true;
    }

}
