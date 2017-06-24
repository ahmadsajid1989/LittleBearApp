<?php

namespace Acm\DatacollectorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HumanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullname', TextType::class)
            ->add('dateofbirth', BirthdayType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ))
            ->add('dobFlag')
            /*->add('sex', ChoiceType::class, array(
                'choices' => [
                    1 => 'Male',
                    2 => 'Female',
                    3 => 'Third Gender',
                ],
            ))*/
            ->add('sex')
            ->add('age')
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(

            'data_class' => 'Acm\DatacollectorBundle\Entity\Human',

        ));
    }

    public function getBlockPrefix()
    {
        return 'human';
    }
}
