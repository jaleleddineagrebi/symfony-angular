<?php

namespace AppBundle\Form;

use AppBundle\Entity\categorie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name',TextType::class)
            ->add('price',MoneyType::class,array('scale'=>2,'currency'=>false,))->add('isSold')->add('createdAt')
        //->add('categorie',categorieType::class);
        ->add('categorie',EntityType::class,array(
            'class'=>'AppBundle\Entity\categorie',
            'choice_label'=>'name',
            'expanded'=>false,
            'multiple'=>false
        ));
    }

    /*
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Product'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_product';
    }


}
