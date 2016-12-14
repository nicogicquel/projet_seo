<?php

namespace SeoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

class CampingType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomCamping')
                ->add('region',EntityType::class,array( 'class'=>'SeoBundle:Region',
                                                        'choice_label'=>'nom'))
                ->add('departement',EntityType::class,array('class'=>'SeoBundle:Departement',
                                                            'choice_label'=>'nom'))
                ->add('ville',EntityType::class,array(  
                    'class'=>'SeoBundle:Ville',
                    'query_builder'=> function(EntityRepository $er){
                        return $er->createQueryBuilder('v')
                                  ->orderBy('v.nom', 'ASC');
                    },
                    'choice_label'=>'nom'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SeoBundle\Entity\Camping'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'seobundle_camping';
    }


}
