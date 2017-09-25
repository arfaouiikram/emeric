<?php

namespace AppBundle\Form;


use AppBundle\Entity\ModeleRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CylindreeForm extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('designation')
            ->add('Modeleid', EntityType::class, array(
                'class' => 'AppBundle:Modele',
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
            'data_class' => 'AppBundle\Entity\Cylindree'
        ));
    }

    public function getName()
    {
        return 'cylindree_form';
    }

}
