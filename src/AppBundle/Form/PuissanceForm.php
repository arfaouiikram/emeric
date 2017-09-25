<?php

namespace AppBundle\Form;


use AppBundle\Entity\ModeleRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PuissanceForm extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('designation')
            ->add('Cylindreeid', EntityType::class, array(
                'class' => 'AppBundle:Cylindree',
                'choice_label' => 'designation',))
            ->add('file',FileType::class, array(
                'label' => 'Logo (png , jpg , JPEG ...)',
                'required'=>false
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Puissance'
        ));
    }

    public function getName()
    {
        return 'puissance_form';
    }

}
