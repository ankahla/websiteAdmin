<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UserBundle\Controller;

use Symfony\Component\Security\Core\SecurityContext;
use FOS\UserBundle\Controller\RegistrationController as BaseController;

class SecurityController extends BaseController
{
    public function loginAction()
    {
        $request = $this->container->get('request');
        /* @var $request \Symfony\Component\HttpFoundation\Request */
        $session = $request->getSession();
        /* @var $session \Symfony\Component\HttpFoundation\Session\Session */

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        if ($error) {
            // TODO: this is a potential security risk (see http://trac.symfony-project.org/ticket/9523)
            $error = $error->getMessage();
        }
        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContext::LAST_USERNAME);
        $lastUser = null;
        
        $em = $this->container->get('doctrine')->getEntityManager();

        $loginPage = $request->query->get('login_page', false);
        if (!$loginPage) {
            if (!$lastUsername) {
                $lastUser = $em->getRepository('UserBundle:User')->findOneBy(array('enabled' => 1), array('lastLogin' => 'DESC'));
            } else {
                $lastUser = $em->getRepository('UserBundle:User')->findOneByUsername($lastUsername);
            }
        }
        
        $csrfToken = $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate');

        $registrationForm = $this->container->get('fos_user.registration.form');

        if ($lastUser) {
            $data = array(
                'registrationForm' => $registrationForm->createView(),
                'last_username' => $lastUsername,
                'lastUser' => $lastUser,
                'error' => $error,
                'csrf_token' => $csrfToken,
            );
            return $this->container->get('templating')->renderResponse('FOSUserBundle:Security:session.html.twig', $data);
        }

        return $this->renderLogin(array(
            'registrationForm' => $registrationForm->createView(),
            'last_username' => $lastUsername,
            'error' => $error,
            'csrf_token' => $csrfToken,
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
        $template = sprintf('FOSUserBundle:Security:login.html.%s', $this->container->getParameter('fos_user.template.engine'));

        return $this->container->get('templating')->renderResponse($template, $data);
    }

    public function checkAction()
    {
        throw new \RuntimeException('You must configure the check path to be handled by the firewall using form_login in your security firewall configuration.');
    }

    public function logoutAction()
    {
        throw new \RuntimeException('You must activate the logout in your security firewall configuration.');
    }
}
