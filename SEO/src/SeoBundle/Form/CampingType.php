<?php

namespace SeoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Doctrine\ORM\EntityRepository;

class CampingType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomCamping', TextType::class, array(
                  'label'=>'Nom du Camping:'))
                ->add('region',EntityType::class,array( 
                  'class'=>'SeoBundle:Region',
                  'choice_label'=>'nom',
                  'label'=>'Région:',
                  'required'    => false,
                  'placeholder' => 'Choisissez une région'))
                ->add('departement',EntityType::class,array(
                  'class'=>'SeoBundle:Departement',
                  'choice_label'=>'nom',
                  'label'=>'Département:',
                  'required'    => false,
                  'placeholder' => 'Choisissez un département'))
                ->add('ville',EntityType::class,array(  
                    'class'=>'SeoBundle:Ville',
                    'query_builder'=> function(EntityRepository $er){
                        return $er->createQueryBuilder('v')
                                  ->orderBy('v.nom', 'ASC');
                    },
                    'choice_label'=>'nom',
                    'label'=>'Ville:',
                    'required'    => false,
                    'placeholder' => 'Choisissez une ville'));
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
        return 'seobundle_form';
    }


}
