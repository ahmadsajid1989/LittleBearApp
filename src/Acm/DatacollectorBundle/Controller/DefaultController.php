<?php

namespace Acm\DatacollectorBundle\Controller;

use Acm\DatacollectorBundle\Entity\HouseHoldRole;
use Acm\DatacollectorBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class DefaultController extends Controller
{
    public function indexAction(UserPasswordEncoderInterface $encoder)
    {
        /*$user = new User();
        $user->setUsername('ahmad');

        $user->setRoles(['ROLE_SUPER_ADMIN']);
        $user->setUserType('admin');
        $user->setIsActive(true);
        $plainPassword = 'ahmad123';
        $encoded = $encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);*/

        $houseHold = new HouseHoldRole();
        $houseHold->setRole('Relative');
        $houseHold->setRoleSlug('relative');

        $em = $this->getDoctrine()->getManager();
        $em->persist($houseHold);
        $em->flush();

        return new Response('Success', 200);
    }
}
