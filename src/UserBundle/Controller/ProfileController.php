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

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Controller\RegistrationController as BaseController;

/**
 * Controller managing the user profile
 *
 * @author Christophe Coevoet <stof@notk.org>
 */
class ProfileController extends BaseController
{
    /**
     * Show the user
     */
    public function showAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        return $this->container->get('templating')->renderResponse('FOSUserBundle:Profile:show.html.'.$this->container->getParameter('fos_user.template.engine'), array('user' => $user));
    }

    /**
     * Edit the user
     */
    public function editAction(Request $request)
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $this->container->get('security.context')->getToken()->getUser();
        $oldAvatar = $user->getAvatar();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $form = $this->container->get('fos_user.profile.form');
        $form->setData($user);
        if ('POST' === $request->getMethod()) {
            $form->bind($request);
            if ($user->getAvatar()) {
                $avatar = $this->upload($user->getAvatar(), $oldAvatar);
                $user->setAvatar($avatar);
            } else {
                $user->setAvatar($oldAvatar);
            }
            $userManager->updateUser($user);
            $userManager->reloadUser($user);
            $this->setFlash('fos_user_success', 'profile.flash.updated');
            return new RedirectResponse($this->getRedirectionUrl($user));
        }

        return $this->container->get('templating')->renderResponse(
            'FOSUserBundle:Profile:edit.html.'.$this->container->getParameter('fos_user.template.engine'),
            array('form' => $form->createView())
        );
    }
    protected function upload($file, $oldFile)
    {
        if ($file) {
            if ($oldFile) {
                $oldFile = $this->container->getParameter('kernel.root_dir').'/../web/'.$oldFile;
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $dir = $this->container->getParameter('kernel.root_dir').'/../web/img/profile';
            $file->move($dir, $fileName);
            return 'img/profile/'.$fileName;
        }
        return '';
    }

    /**
     * Generate the redirection url when editing is completed.
     *
     * @param \FOS\UserBundle\Model\UserInterface $user
     *
     * @return string
     */
    protected function getRedirectionUrl(UserInterface $user)
    {
        return $this->container->get('router')->generate('fos_user_profile_show');
    }

    /**
     * @param string $action
     * @param string $value
     */
    protected function setFlash($action, $value)
    {
        $this->container->get('session')->getFlashBag()->set($action, $value);
    }
}
