<?php

namespace websites\ManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FtpAccountsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
/*            ->add('idWebsite', 'entity', array(
                'class' => 'websites\ManagementBundle\Entity\Website',
                'property' => 'domain',
                'label' => 'Nom de domaine',
                ))*/
                
            ->add('idWebsite', TextType::class, array('label' => 'Nom de domaine'))
            ->add('host', TextType::class, array('label' => 'Hote'))
            ->add('login', TextType::class)
            ->add('passwd', TextType::class, array('label' => 'Mot de passe'))
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'websites\ManagementBundle\Entity\FtpAccounts'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'websites_managementbundle_ftpaccounts';
    }
}
