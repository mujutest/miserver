<?php

namespace Acme\MinticBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserCallType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('call_id')
            ->add('name')
            ->add('email')
            ->add('url_image')
            ->add('institution')
            ->add('academic_program')
            ->add('cc')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\MinticBundle\Entity\UserCall'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_minticbundle_usercall';
    }
}
