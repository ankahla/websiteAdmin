<?php

namespace websites\ManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmailAccType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idWebsite', IntegerType::class, array('label' => 'Nom de domaine'))
            ->add('email', EmailType::class, array('label' => 'Compte email'))
            ->add('password', TextType::class, array('label' => 'Mot de passe'))
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'websites\ManagementBundle\Entity\EmailAcc'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'websites_managementbundle_emailacc';
    }
}
