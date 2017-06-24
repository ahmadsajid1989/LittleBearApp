<?php

namespace Acm\DatacollectorBundle\Controller;

use Acm\DatacollectorBundle\Entity\ApiUser;
use Acm\DatacollectorBundle\Entity\Human;
use Acm\DatacollectorBundle\Form\HumanType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HumanController extends Controller
{
    public function newApiAction(Request $request)
    {
        $body = $request->getContent();
        $data = json_decode($body, true);

        $human = new Human();
        $form = $this->createForm(HumanType::class, $human);
        $em = $this->getDoctrine()->getManager();
        //for test purpose

         if (!isset($data['dateofbirth'])) {
             $age = $data['age'];
             $today = new \DateTime('now');
             $newDob = $today->modify("-$age year")->format('Y-m-d');
             $dateOfBirth = new \DateTime($newDob);
         }

        $form->submit($data);
        if (!isset($data['dateofbirth'])) {
            $human->setDateofbirth($dateOfBirth);
        }
        $em->persist($human);
        $em->flush();

        return new Response('Data Saved Successfully', 201);
    }

    public function createAction()
    {
        $user = new ApiUser();
        $user->setUsername('ahmadsajid');
        $user->setApiKey('ososndonceuiwueps');

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return new Response('Success', 200);
    }

    public function testAction()
    {
        return new Response('Hello');
    }
}
