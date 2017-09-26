<?php
/**
 * Created by PhpStorm.
 * User: Ahmad Sajid
 * Date: 9/24/2017
 * Time: 11:43 PM
 */

namespace Acm\DatacollectorBundle\EventListener;


use Acm\DatacollectorBundle\Entity\Human;
use DateTime;
use Doctrine\ORM\Event\LifecycleEventArgs;



/**
 * Class DateofBirthListener
 * @package Acm\DatacollectorBundle\EventListener
 */
class DateofBirthListener
{

    /**
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $em = $args->getEntityManager();

       if($entity instanceof Human){

           ///dump($entity->getDateOfBirth()); exit;

           if($entity->getDateOfBirth() == null){

           $entity->setDateOfBirth($this->findDateofBirthFromAge($entity->getAge()));
           $entity->setDobFlag(0);
           }else{

               $entity->setDateOfBirth($entity->getDateOfBirth());
               $entity->setDobFlag(1);
               $entity->setAge($this->findAgeFromDateOfBirth($entity->getDateOfBirth()));
           }

       }



    }

    /**
     * @param $age
     * @return DateTime
     */
    private  function findDateofBirthFromAge($age){

        $today = new \DateTime('now');
        $newDob = $today->modify("-$age year")->format('Y-m-d');
        $dateOfBirth = new \DateTime($newDob);

        return $dateOfBirth;
    }

    /**
     * @param $dateOfbirth
     * @return int
     */
    private function findAgeFromDateOfBirth($dateOfbirth)
    {

        $age = date_diff(new \DateTime(), $dateOfbirth)->y;

        return $age;

    }


}