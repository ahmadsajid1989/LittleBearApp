<?php
/**
 * Created by PhpStorm.
 * User: Ahmad Sajid
 * Date: 11/19/2017
 * Time: 1:47 PM
 */

namespace Acm\DatacollectorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;


class PhotoType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('photo', FileType::class)
                ->add('humanId');
    }

    public function getName()
    {
        return 'photo';
    }

}