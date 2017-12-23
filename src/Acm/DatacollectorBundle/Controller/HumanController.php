<?php

namespace Acm\DatacollectorBundle\Controller;

use Acm\DatacollectorBundle\Datatables\HumanDatatable;
use Acm\DatacollectorBundle\Entity\HouseHold;
use Acm\DatacollectorBundle\Entity\Human;
use Acm\DatacollectorBundle\Entity\Location;
use Acm\DatacollectorBundle\Form\HumanType;
use Acm\DatacollectorBundle\Form\PhotoType;
use Sg\DatatablesBundle\Datatable\DatatableInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class HumanController
 * @package Acm\DatacollectorBundle\Controller
 */
class HumanController extends Controller
{
    public function newApiAction(Request $request)
    {
        $body = $request->getContent();
        $data = json_decode($body, true);

        $human = new Human();
        $form = $this->createForm(HumanType::class, $human);


        $em = $this->getDoctrine()->getManager();

         if($data['familyFlag'] == 1){

             $house = $em->getRepository("AcmDatacollectorBundle:HouseHold")->findOneBy(['id' => $data['houseHold']['id']]);

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
             $houseHold->setVulnerable($data['houseHold']['vulnerable']);
             $location = new Location();
             $location->setHouseHold($houseHold);
             $location->setAddressVillage(isset($data['location']['address_village']) ? $data['location']['address_village'] : null);
             $location->setAddressUpazilla(isset($data['location']['address_upazilla']) ?$data['location']['address_upazilla'] :null);
             $location->setAddressDistrict(isset($data['location']['address_district']) ?$data['location']['address_district'] :null);
             $location->setAddressDivision(isset($data['location']['address_division']) ? $data['location']['address_division']: null);


             $location->setHostAddressVillage(isset($data['location']['host_address_village']) ? $data['location']['host_address_village']: null);
             $location->setHostAddressUpazilla(isset($data['location']['host_address_upazilla']) ? $data['location']['host_address_upazilla'] :null);
             $location->setHostAddressDistrict(isset($data['location']['host_address_district'])? $data['location']['host_address_district'] : null);
             $location->setHostAddressDivision(isset($data['location']['host_address_division'])?$data['location']['host_address_division']: null);

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

        $humanId =  $human->getUniqueId();


        return new JsonResponse(array('message'=>'Data Saved Successfully', 'humanId' => $humanId), 200);
    }

    public function listHumanAction(Request $request)
    {

        $datatable = $this->get('app.datatable.human');
        $datatable->buildDatatable();

        return $this->render('AcmDatacollectorBundle:Human:index.html.twig', array(
            'datatable' => $datatable,
        ));
    }

    public function listResultsAction()
    {
        $datatable = $this->get('app.datatable.human');
        $datatable->buildDatatable();

        $query = $this->get('sg_datatables.query')->getQueryFrom($datatable);

        return $query->getResponse();
    }

    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AcmDatacollectorBundle:Human')->find($id);

        if(!$entity)
        {
            throw $this->createNotFoundException("Resource Not Found");
        }

        $path =  $this->getParameter('pic.upload.dir');

        return $this->render('@AcmDatacollector/Human/show.html.twig', array(
            'entity' => $entity,
            'imgpath' => $path
        ));
    }

    public function uploadPictureAction(Request $request)
    {
        $file = $request->files->get('photo');
        $picture = $this->getPhotoUploader()->upload($file);
        $humanId = $request->request->get('humanId');

        $em = $this->getDoctrine()->getManager();
        $human = $em->getRepository('AcmDatacollectorBundle:Human')->findOneBy(['uniqueId' => $humanId]);

        if(!$human)
        {
            return new JsonResponse(array('No human found with this id'), 404);

        } if($human) {

            $human->setPicture($picture);
            $em->persist($human);
            $em->flush();

            return new JsonResponse(array('message' => 'Image Saved Successfully'), 200);

        }

       return new JsonResponse(array('message' => 'Something went wrong'), 500);

    }

    protected function getPhotoUploader()
    {
        return $this->get('photo_uploader');
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return $this->getParameter('pic.upload.dir');
    }




}
