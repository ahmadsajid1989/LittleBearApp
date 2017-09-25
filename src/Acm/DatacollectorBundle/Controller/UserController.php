<?php

namespace Acm\DatacollectorBundle\Controller;

use Acm\DatacollectorBundle\Entity\User;
use Acm\DatacollectorBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // 1) build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            if($user->getUserType() == 'admin') {

                $user->setRoles(['ROLE_ADMIN','ROLE_USER']);

            }elseif ($user->getUserType()== 'manager')
            {
                $user->setRoles(['ROLE_MANAGER','ROLE_USER']);

            }else{

                $user->setRoles(['ROLE_USER']);
            }

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('acm_dashboard');
        }

        return $this->render(
            'AcmDatacollectorBundle:Registration:register.html.twig',
            array('form' => $form->createView())
        );
    }
}
