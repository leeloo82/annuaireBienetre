<?php

namespace App\Form;

use App\Entity\CategorieServices;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategorieServicesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomService')
            ->add('description')
            ->add('enAvant')
            ->add('valide')
            ->add('Prestataire')
            ->add('Images')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CategorieServices::class,
        ]);
    }
}
