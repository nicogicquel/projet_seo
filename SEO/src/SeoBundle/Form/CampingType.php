<?php

namespace SeoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Doctrine\ORM\EntityRepository;
use SeoBundle\Entity\Region;


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
                ->add('ville',VilleType::class, array (
                  'label' => false,
                  'required' => false ));

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
    
    //$builder->add('enregistrer','submit');
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
