<?php

namespace Acm\DatacollectorBundle\Controller;

use Acm\DatacollectorBundle\Entity\HouseHold;
use Acm\DatacollectorBundle\Entity\Human;
use Acm\DatacollectorBundle\Entity\Location;
use Acm\DatacollectorBundle\Form\HumanType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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

         if(isset($data['houseHold'])){

             $house = $em->getRepository("AcmDatacollectorBundle:HouseHold")->findOneBy(['id' => $data['houseHold']]);

             if($house){

                 $human->setHouseHold($house);
             }else{

                 return new JsonResponse(['message'=> "Household Not Found"], 404,['content-type'=> 'application/json']);
             }
         }


         if(isset($data['houseHold.friendly_name'])){

             $houseHold = new HouseHold();
             $houseHold->setFriendlyName($data['houseHold.friendly_name']);
             $houseHold->setVulnerable($data['houseHold.vulnerable']);
             $location = new Location();
             $location->setHouseHold($houseHold);
             $location->setAddressVillage($data['location.address_village']);
             $location->setAddressUpazilla($data['location.address_upazilla']);
             $location->setAddressDistrict($data['location.address_district']);
             $location->setAddressDivision($data['location.address_division']);


             $location->setHostAddressVillage($data['location.host_address_village']);
             $location->setHostAddressUpazilla($data['location.host_address_upazilla']);
             $location->setHostAddressDistrict($data['location.host_address_district']);
             $location->setHostAddressDivision($data['location.host_address_division']);

             $location->setCampName($data['camp_name']);
             $location->setCampBlock($data['camp_block']);
             $location->setCampWard($data['camp_ward']);


             $location->setGpsLatitude($data['location.latitude']);
             $location->setGpsLongitude($data['location.longitude']);

             $em->persist($houseHold);
             $em->persist($location);
             $em->flush();

             $houseHoldId = $houseHold->getId();
             $house = $em->getRepository("AcmDatacollectorBundle:HouseHold")->findOneBy(['id' => $houseHoldId]);

             $form->submit($data);
             $human->setHouseHold($house);
             $em->persist($human);
             $em->flush();


         } else {

             $form->submit($data);
             $em->persist($human);
             $em->flush();
         }


        return new Response('Data Saved Successfully', 201);
    }


}
