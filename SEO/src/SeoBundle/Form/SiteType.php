<?php

namespace SeoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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
                ->add('cT',TextType::class, array('label'=>'CT'))
                ->add('tF',TextType::class, array('label'=>'TF'))
                ->add('topical')
                ->add('langue')
                ->add('region',TextType::class, array('label'=>'Région','required'=> false))
                ->add('departement',TextType::class, array('label'=>'Département','required'=> false))
                ->add('ville')
                ->add('type')
                ->add('difficulte',TextType::class, array('label'=>'Difficultés','required'=> false))
                ->add('infos',TextType::class, array('label'=>'Informations Complémentaires','required'=> false))
                ->add('campings',EntityType::class, array(
                            'class'=>'SeoBundle:Camping',
                            'choice_label'=>'nomCamping',
                            'label'=>'Campings',
                            'multiple'=>true,
                            'expanded'=>true,
                            'empty_data'=>"ROLE_USER",
                            'required'=>false
                        ))        ;       
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
