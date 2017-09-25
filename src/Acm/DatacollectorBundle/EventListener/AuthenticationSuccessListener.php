<?php
/**
 * Created by PhpStorm.
 * User: Ahmad
 * Date: 7/7/2017
 * Time: 7:31 PM.
 */

namespace Acm\DatacollectorBundle\EventListener;

use Acm\DatacollectorBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class AuthenticationSuccessListener.
 */
class AuthenticationSuccessListener
{
    /**
     * @var EntityManager
     */
    protected $em;
    /**
     * @var Container
     */
    protected $container;

    /**
     * AuthenticationSuccessListener constructor.
     *
     * @param $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->em = $this->container->get('doctrine')->getManager();
    }

    /**
     * @param AuthenticationSuccessEvent $event
     */
    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
    {
        $data = $event->getData();
        $user = $event->getUser();

        if (!$user instanceof UserInterface) {
            return;
        }

        /*
         * @var $requestedUser User
         */

        $em = $this->em;
        $requestedUser = $em->getRepository('AcmDatacollectorBundle:User')->findOneBy(['username' => $user->getUsername()]);
        $requestedUser->setLastLogin(new \DateTime());
        $em->persist($requestedUser);
        $em->flush();

        $data['data'] = array(
            'user' => $user->getUsername(),
            //'roles' => $user->getRoles(),
        );

        $event->setData($data);
    }
}
