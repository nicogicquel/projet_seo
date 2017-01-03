<?php

namespace SeoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Doctrine\ORM\EntityRepository;
use SeoBundle\Entity\Region;

class SiteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('url', TextType::class, array(
                    'label'=>'URL du site:'))
                ->add('titre', TextType::class, array(
                    'label'=>'Titre:',
                    'required'=> false))
                ->add('statut',EntityType::class,array(
                    'class'=>'SeoBundle:Statut',
                    'choice_label'=>'nom',
                    'label'=>'Statut:',
                    'required'=> false,
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
                    'required'=> false,
                    'placeholder' => 'Choisissez un topic'
                    ))
                ->add('langue',EntityType::class,array(
                    'class'=>'SeoBundle:Langue',
                    'choice_label'=>'nom',
                    'label'=>'Langue:',
                    'required' => false,
                    'placeholder' => 'Choisissez une langue'
                    ))
                
                ->add('type',EntityType::class,array(
                    'class'=>'SeoBundle:Type',
                    'choice_label'=>'nom',
                    'label'=>'Type de site:',
                    'required'=> false,
                    'placeholder' => 'Choisissez un type'
                    ))
                ->add('difficulte', TextType::class, array(
                    'label'=>'Difficultés:',
                    'required'=> false))
                ->add('infos', TextType::class, array(
                    'label'=>'Informations complémentaires:',
                    'required'=> false))
                
                ->add('region',EntityType::class,array(
                    'class'=>'SeoBundle:Region',
                    'choice_label'=>'nom',
                    'label'=>'Région:',
                    'required'=> false,
                    'placeholder' => 'Choisissez une région'
                    ))
                ->add('departement')
                ->add('departement',EntityType::class,array(
                    'class'=>'SeoBundle:Departement',
                    'choice_label'=>'nom',
                    'label'=>'Département:',
                    'required'=> false,
                    'placeholder' => 'Choisissez un département'
                    ))
                ->add('ville',VilleType::class,array(
                    'label'=> false))

                ->add('campings',EntityType::class, array(
                        'class'=>'SeoBundle:Camping',
                        'query_builder'=> function(EntityRepository $er){
                        return $er->createQueryBuilder('c')
                                  ->orderBy('c.nomCamping', 'ASC');
                        },
                        'choice_label'=>'nomCamping',
                        'attr'=> array('class'=>'checkbox_form'),
                        'label'=>'Campings liés',
                        'multiple'=>true,
                        'expanded'=>true)) 
                
                       
   ;
   $formModifier = function (FormInterface $form, Region $region = null) {
        $departement = null === $region ? array() : $region->getDepartements();

        $form->add('departement', EntityType::class,array(
                  'class'=>'SeoBundle:Departement',
                  'choices'     => $departement,
                  'choice_label' => 'nom',
                  'label'=>'Département:',
                  'required'    => false,
                  'placeholder' => 'Choisissez un département'));
      
      };

      $builder->addEventListener(
      FormEvents::PRE_SET_DATA,
      function (FormEvent $event) use ($formModifier) {
        
        $data = $event->getData();

        $formModifier($event->getForm(), $data->getRegion());
      }
    );

      $builder->get('region')->addEventListener(
      FormEvents::POST_SUBMIT,
      function (FormEvent $event) use ($formModifier) {
        // It's important here to fetch $event->getForm()->getData(), as
        // $event->getData() will get you the client data (that is, the ID)
        $region = $event->getForm()->getData();

        // since we've added the listener to the child, we'll have to pass on
        // the parent to the callback functions!
        $formModifier($event->getForm()->getParent(), $region);
      }
    );
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
