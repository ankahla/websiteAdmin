<?php

namespace websites\ManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CmsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idWebsite', IntegerType::class, array('label' => 'Nom de domaine'))
            ->add('adminUrl', UrlType::class, array('label' => 'Back-office'))
            ->add('type', TextType::class, array('label' => 'Type'))
            ->add('login', TextType::class, array('label' => 'Login'))
            ->add('password', TextType::class, array('label' => 'Mot de passe'))
            ->add('contact', TextType::class, array('label' => 'Email de contact'))
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'websites\ManagementBundle\Entity\Cms'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'websites_managementbundle_cms';
    }
}
