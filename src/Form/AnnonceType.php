<?php

namespace App\Form;

use App\Entity\Voiture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('marque')
            ->add('modele')
            ->add('image')
            ->add('km')
            ->add('prix')
            ->add('nbproprio')
            ->add('cylindree')
            ->add('puissance')
            ->add('carburant')
            ->add('transmission')
            ->add('description')
            ->add('texte')
            ->add('circ');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}
