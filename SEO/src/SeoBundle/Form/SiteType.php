<?php

namespace SeoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Doctrine\ORM\EntityRepository;

class SiteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('url', TextType::class, array(
                    'label'=>'Url du site:'))
                ->add('titre', TextType::class, array(
                    'label'=>'Titre:'))
                ->add('statut',EntityType::class,array(
                    'class'=>'SeoBundle:Statut',
                    'choice_label'=>'nom',
                    'label'=>'Statut:',
                    'required'    => false,
                    'placeholder' => 'Choisissez un statut'
                    ))
                ->add('cT', TextType::class, array(
                    'label'=>'CT:'))
                ->add('tF', TextType::class, array(
                    'label'=>'TF:'))
                ->add('topical',EntityType::class,array(
                    'class'=>'SeoBundle:Topical',
                    'choice_label'=>'nom',
                    'label'=>'Topic:',
                    'required'    => false,
                    'placeholder' => 'Choisissez un topic'
                    ))
                ->add('langue',EntityType::class,array(
                    'class'=>'SeoBundle:Langue',
                    'choice_label'=>'nom',
                    'label'=>'Langue:',
                    'required'    => false,
                    'placeholder' => 'Choisissez une langue'
                    ))
                ->add('region',EntityType::class,array(
                    'class'=>'SeoBundle:Region',
                    'choice_label'=>'nom',
                    'label'=>'Région:',
                    'required'    => false,
                    'placeholder' => 'Choisissez une région'
                    ))
                ->add('departement')
                ->add('departement',EntityType::class,array(
                    'class'=>'SeoBundle:Departement',
                    'choice_label'=>'nom',
                    'label'=>'Département:',
                    'required'    => false,
                    'placeholder' => 'Choisissez un département'
                    ))
                ->add('ville',EntityType::class,array(
                    'class'=>'SeoBundle:Ville',
                    'query_builder'=> function(EntityRepository $er){
                        return $er->createQueryBuilder('v')
                                  ->orderBy('v.nom', 'ASC');
                    },
                    'choice_label'=>'nom',
                    'label'=>'Ville:',
                    'required'    => false,
                    'placeholder' => 'Choisissez une langue'
                    ))
                ->add('type',EntityType::class,array(
                    'class'=>'SeoBundle:Type',
                    'choice_label'=>'nom',
                    'label'=>'Type de site:',
                    'required'    => false,
                    'placeholder' => 'Choisissez un type'
                    ))
                ->add('difficulte', TextType::class, array(
                    'label'=>'Difficultés:'))
                ->add('infos', TextType::class, array(
                    'label'=>'Informations complémentaires:'))
                ->add('campings',EntityType::class, array(
                        'class'=>'SeoBundle:Camping',
                        'choice_label'=>'nomCamping',
                        'attr'=> array('class'=>'checkbox_form'),
                        'label'=>'Campings liés',
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
        return 'seobundle_form';
    }


}
