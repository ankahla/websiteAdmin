<?php

namespace websites\ManagementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('websitesManagementBundle:Default:index.html.twig', array('name' => $name));
    }
}
