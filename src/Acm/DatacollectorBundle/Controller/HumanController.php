<?php

namespace Acm\DatacollectorBundle\Controller;

use Acm\DatacollectorBundle\Datatables\HumanDatatable;
use Acm\DatacollectorBundle\Entity\HouseHold;
use Acm\DatacollectorBundle\Entity\Human;
use Acm\DatacollectorBundle\Entity\Location;
use Acm\DatacollectorBundle\Form\HumanType;
use Sg\DatatablesBundle\Datatable\DatatableInterface;
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

         if($data['familyFlag']==1){

             $house = $em->getRepository("AcmDatacollectorBundle:HouseHold")->findOneBy(['id' => $data['houseHold']]);

             if($house){

                 $human->setHouseHold($house);
             }else{

                 return new JsonResponse(['message'=> "Household Not Found"], 404,['content-type'=> 'application/json']);
             }
         }


         if(($data['familyFlag'] == 0)){

             //dump($data['houseHold']['friendly_name']); exit;

             $houseHold = new HouseHold();
             $houseHold->setFriendlyName($data['houseHold']['friendly_name']);
             $houseHold->setVulnerable(isset($data['houseHold']['vulnerable'])? $data['houseHold']['vulnerable'] : null);
             $location = new Location();
             $location->setHouseHold($houseHold);
             $location->setAddressVillage(isset($data['location']['address_village']) ? $data['location']['address_village'] : null);
             $location->setAddressUpazilla(isset($data['location']['address_upazilla']) ?$data['location']['address_upazilla'] :null);
             $location->setAddressDistrict(isset($data['location']['address_district']) ?$data['location']['address_district'] :null);
             $location->setAddressDivision($data['location']['address_division']);


             $location->setHostAddressVillage(isset($data['location']['host_address_village']) ? $data['location']['host_address_village']: null);
             $location->setHostAddressUpazilla(isset($data['location']['host_address_upazilla']) ? $data['location']['host_address_upazilla'] :null);
             $location->setHostAddressDistrict(isset($data['location']['host_address_district'])? $data['location']['host_address_district'] : null);
             $location->setHostAddressDivision($data['location']['host_address_division']);

             $location->setCampName(isset($data['camp_name']) ? $data['camp_name']:null );
             $location->setCampBlock(isset($data['camp_block'])? $data['camp_block'] : null);
             $location->setCampWard(isset($data['camp_ward'])? $data['camp_ward']: null);


             $location->setGpsLatitude(isset($data['location']['latitude']) ? $data['location']['latitude']: null);
             $location->setGpsLongitude(isset($data['location']['longitude']) ? $data['location']['longitude'] :null);

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

    public function listHumanAction(Request $request)
    {


       /* $isAjax = $request->isXmlHttpRequest();

        // Get your Datatable ...
        $datatable = $this->get('app.datatable.human');
        $datatable->buildDatatable();*/

        $em = $this->getDoctrine()->getManager();
        $datatable  =  $em->getRepository("AcmDatacollectorBundle:Human")->findAll();

               //dump($datatable); exit;

        // or use the DatatableFactory
        /** @var DatatableInterface $datatable */
        //$datatable = $this->get('sg_datatables.factory')->create(HumanDatatable::class);
        //$datatable->buildDatatable();

       /* if ($isAjax) {
            $responseService = $this->get('sg_datatables.response');
            $responseService->setDatatable($datatable);
            $responseService->getDatatableQueryBuilder();

            return $responseService->getResponse();
        }*/

        //dump($datatable); exit;

        return $this->render('AcmDatacollectorBundle:Human:index.html.twig', array(
            'entities' => $datatable,
        ));


    }

    public function showAction(Human $human)
    {
        return $this->render('@AcmDatacollector/Human/show.html.twig', array(
            'human' => $human
        ));
    }


}
