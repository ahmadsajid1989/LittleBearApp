<?php
/**
 * Created by PhpStorm.
 * User: Ahmad Sajid
 * Date: 9/24/2017
 * Time: 11:43 PM
 */

namespace Acm\DatacollectorBundle\EventListener;


use Acm\DatacollectorBundle\Entity\Human;
use Doctrine\ORM\Event\LifecycleEventArgs;


class DateofBirthListener
{

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $em = $args->getEntityManager();

       if($entity instanceof Human){

           if($entity->getDobFlag() == 0){

           $entity->setDateOfBirth($this->findDateofBirthFromAge($entity->getAge()));
           }

       }



    }

    private  function findDateofBirthFromAge($age){

        $today = new \DateTime('now');
        $newDob = $today->modify("-$age year")->format('Y-m-d');
        $dateOfBirth = new \DateTime($newDob);

        return $dateOfBirth;


    }


}