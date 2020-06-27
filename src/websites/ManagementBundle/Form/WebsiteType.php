<?php

namespace websites\ManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WebsiteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('domain', TextType::class, array('label' => 'Nom de domaine'))
            ->add('online', CheckboxType::class, array('label' => 'En ligne', 'required' => false))
            ->add('ip', TextType::class, array('label' => 'Adresse IP', 'required' => false))
            ->add('cpanel', TextType::class, array('label' => 'Cpanel', 'required' => false))
            ->add('cplogin', TextType::class, array('label' => 'Login', 'required' => false))
            ->add('cppass', TextType::class, array('label' => 'Mot de passe', 'required' => false))
            ->add('pop3', TextType::class, array('label' => 'POP3', 'required' => false))
            ->add('smtp', TextType::class, array('label' => 'SMTP', 'required' => false))
            ->add('webmail', TextType::class, array('label' => 'Webmail', 'required' => false))
            ->add('dns1', TextType::class, array('label' => 'DNS 1', 'required' => false))
            ->add('dns2', TextType::class, array('label' => 'DNS 2', 'required' => false))
            ->add('billing', UrlType::class, array('label' => 'Adresse facturation', 'required' => false))
            ->add('billinglogin', TextType::class, array('label' => 'Login', 'required' => false))
            ->add('billingpass', TextType::class, array('label' => 'Mot de passe', 'required' => false))
            ->add('notes',TextareaType::class, array('label' => 'Notes', 'required' => false))
            ->add('owner', TextType::class, array('label' => 'Propriétaire', 'required' => false))
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'websites\ManagementBundle\Entity\Website'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'websites_managementbundle_website';
    }
}
