<?php

namespace Acm\DatacollectorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class HouseHoldController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository("AcmDatacollectorBundle:HouseHold")->findAll();

        if(!$entity){

            return new JsonResponse(['message'=> "Household Database is empty"], 404,['content-type'=> 'application/json']);
        }


        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $normalizer = new ObjectNormalizer($classMetadataFactory);
        $serializer = new Serializer(array($normalizer));

        $data = $serializer->normalize($entity,null, array('groups' => array('group1')));

        $response['_embedded'] = $data;

        return new JsonResponse($response, 200, ['content-type'=> 'application/json']);
    }

    public function getHouseHoldBySystemIdAction($system_id){

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository("AcmDatacollectorBundle:HouseHold")->findOneBy(['system_id' => $system_id]);

        if(!$entity){

            return new JsonResponse(['message'=> "Household Not Found For $system_id"], 404,['content-type'=> 'application/json']);
        }


        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $normalizer = new ObjectNormalizer($classMetadataFactory);
        $serializer = new Serializer(array($normalizer));

        $data = $serializer->normalize($entity,null, array('groups' => array('group1')));

        $response['_embedded'] = $data;

        return new JsonResponse($response, 200, ['content-type'=> 'application/json']);

    }
}
