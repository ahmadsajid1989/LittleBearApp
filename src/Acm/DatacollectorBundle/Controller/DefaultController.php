<?php

namespace Acm\DatacollectorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmDatacollectorBundle:Default:index.html.twig');
    }
}
