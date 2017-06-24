<?php
/**
 * Created by PhpStorm.
 * User: Ahmad
 * Date: 6/24/2017
 * Time: 3:10 PM
 */

namespace Acm\DatacollectorBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

class UserController extends Controller
{
    public function findUserAction($apiKey)
    {
        $username = $this->getDoctrine()->getRepository("AcmDatacollectorBundle:ApiUser")->findOneBy(['apiKey'=> $apiKey]);

        if(!$username){

            throw new UsernameNotFoundException(
                sprintf('Username "%s" does not exist for this apiKey.', $username)
            );
        }

        return new Response($username->getUsername());
    }

}