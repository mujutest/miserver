<?php

namespace Acme\MinticBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CountInformationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('male')
            ->add('female')
            ->add('tech')
            ->add('profesional')
            ->add('economicStatus1')
            ->add('economicStatus2')
            ->add('economicStatus3')
            ->add('economicStatus4')
            ->add('economicStatus5')
            ->add('economicStatus6')
            ->add('total')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\MinticBundle\Entity\CountInformation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_minticbundle_countinformation';
    }
}
