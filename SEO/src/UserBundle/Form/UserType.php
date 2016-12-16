<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', TextType::class, array(
                    'label'=>'Username:'))
                ->add('password', TextType::class, array(
                    'label'=>'Password:'))
                ->add('userRoles' ,EntityType::class, array(
                    'class'=>'UserBundle:Role',
                'choice_label'=>'name',
                'attr'=> array('class'=>'checkbox_form'),
                'label'=>'Role(s) à attribuer:',
                'multiple'=>true,
                'expanded'=>true,
                'empty_data'=>"ROLE_USER"
                ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'userbundle_form';
    }


}
