<?php

namespace SeoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SiteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('url')
                ->add('titre')
                ->add('statut')
                ->add('camp')
                ->add('cT')
                ->add('tF')
                ->add('topical')
                ->add('langue',EntityType::class,array(
                    'class'=>'SeoBundle:Langue',
                    'choice_label'=>'nom'))
                ->add('region',EntityType::class,array(
                    'class'=>'SeoBundle:Region',
                    'choice_label'=>'nom'))
                ->add('departement')
                ->add('departement',EntityType::class,array(
                    'class'=>'SeoBundle:Departement',
                    'choice_label'=>'nom'))
                ->add('ville',EntityType::class,array(
                    'class'=>'SeoBundle:Ville',
                    'choice_label'=>'nom'))
                ->add('type')
                ->add('difficulte')
                ->add('infos')
                ->add('campings',EntityType::class, array(
                        'class'=>'SeoBundle:Camping',
                        'choice_label'=>'nomCamping',
                        'label'=>'Role à attribuer',
                        'multiple'=>true,
                        'expanded'=>true
                
                ))        
   ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SeoBundle\Entity\Site'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'seobundle_site';
    }


}
