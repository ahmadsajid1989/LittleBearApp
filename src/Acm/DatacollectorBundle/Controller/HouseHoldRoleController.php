<?php

namespace Acm\DatacollectorBundle\Controller;

use Acm\DatacollectorBundle\Entity\HouseHoldRole;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;


/**
 * Class HouseHoldRoleController
 * @package Acm\DatacollectorBundle\Controller
 */
class HouseHoldRoleController extends Controller
{
    /**
     * To list all available house hold role please use this endpoint. It will return
     * house hold role id, name and slug
     *
     * @var $entity HouseHoldRole
     * @return JsonResponse
     *
     *  @ApiDoc(
     *
     *     resource=true,
     *     resourceDescription="Operations on house hold roles.",
     *     description="Retrieve list of house hold roles.",
     *
     *     section="House Hold Role",
     *     description="This returns list of house hold",
     *     views = { "default"},
     *     version = 1.0,
     *     since  = 1.0,
     *
     *     headers={
     *     {
     *          "name" : "Authorization",
     *          "description"="Token the client needs to provide when making API calls.",
     *          "required"="true"
     *     },
     *     {
     *          "name" : "Content-Type",
     *          "description"="application/json needs to be specified when making request",
     *          "required"="true"
     *     }
     *  },
     *
     *     statusCodes={
     *         200="Returned when successful",
     *         403="Returned when the user is not authorized to say hello",
     *         404={
     *           "Returned when the content is not found",
     *           "Returned when something else is not found"
     *         },
     *         500={
     *           "Returned when Internal Server Error Occured",
     *           "Returned when something is wrong with any Methods"
     *         }
     *     },
     *
     *     tags={
     *         "stable"
     *
     *     }
     * )
     */

    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository("AcmDatacollectorBundle:HouseHoldRole")->findAll();

        if(!$entity){

            return new JsonResponse(['message'=> "Role Database is empty"], 404,['content-type'=> 'application/json']);
        }

        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $normalizer = new ObjectNormalizer($classMetadataFactory, new CamelCaseToSnakeCaseNameConverter());
        $serializer = new Serializer(array($normalizer));

        $data = $serializer->normalize($entity,null, array('groups' => array('group1')));

        $response['_embedded'] = $data;

        return new JsonResponse($response);
    }

    /**
     * @param $slug
     * @return JsonResponse
     */
    public function getRoleBySlugAction($slug){

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository("AcmDatacollectorBundle:HouseHoldRole")->findOneBy(['roleSlug' => $slug]);

        if(!$entity){

            return new JsonResponse(['message'=> "Role Not Found For slug $slug"], 404,['content-type'=> 'application/json']);
        }

        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $normalizer = new ObjectNormalizer($classMetadataFactory, new CamelCaseToSnakeCaseNameConverter());
        $serializer = new Serializer(array($normalizer));

        $data = $serializer->normalize($entity,null, array('groups' => array('group1')));

        $response['_embedded'] = $data;

        return new JsonResponse($response, 200,['content-type'=> 'application/json']);

    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function getRoleByIdAction($id){

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository("AcmDatacollectorBundle:HouseHoldRole")->findOneBy(['id' => $id]);

        if(!$entity){

            return new JsonResponse(['message'=> "Role Not Found For Id $id"], 404,['content-type'=> 'application/json']);
        }

        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $normalizer = new ObjectNormalizer($classMetadataFactory, new CamelCaseToSnakeCaseNameConverter());
        $serializer = new Serializer(array($normalizer));

        $data = $serializer->normalize($entity,null, array('groups' => array('group1')));

        $response['_embedded'] = $data;

        return new JsonResponse($response, 200,['content-type'=> 'application/json']);

    }
}
