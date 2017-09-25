<?php

namespace Acm\DatacollectorBundle\Form;

use Acm\DatacollectorBundle\Entity\Human;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HumanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName', TextType::class)
            ->add('dateOfBirth', BirthdayType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ))
            ->add('dobFlag')
            ->add('sex')
            ->add('age')
            ->add('houseHold')
            ->add('houseHoldRole');

    }



    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(

            'data_class' => Human::class,

        ));
    }

    public function getBlockPrefix()
    {
        return 'human';
    }


}
