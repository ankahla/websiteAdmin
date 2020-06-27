<?php
namespace UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName', 'text', array('required' => false, 'label' => 'Prénom'))
        ->add('lastName', 'text', array('required' => false, 'label' => 'Nom'))
        ->add('function', 'text', array('required' => false, 'label' => 'Fonction'))
        ->add('avatar', 'file', array('required' => false, 'label' => 'Avatar', 'data_class' => null ))
        ->add('phone', 'text', array('required' => false, 'label' => 'Téléphone'))
        ->add('mobile', 'text', array('required' => false, 'label' => 'Mobile'))
        ->add('fb', 'url', array('required' => false, 'label' => 'Page facebook'))
        ->add('skype', 'text', array('required' => false, 'label' => 'Pseudo-skype'));
    }

    public function getParent()
    {
        return 'fos_user_profile';
    }

    public function getBlockPrefix()
    {
        return 'app_user_profile';
    }
}