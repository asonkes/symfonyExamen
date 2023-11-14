<?php

namespace App\Form;

use App\Entity\Voiture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('marque', TextType::class, $this->getConfiguration("Marque : "))
            ->add('modele', TextType::class, $this->getConfiguration("Modèle : "))
            ->add('image', FileType::class, $this->getConfiguration("Image de la Voiture : "))
            ->add('km', NumberType::class, $this->getConfiguration("Kilométrage de la Voiture : "))
            ->add('prix', MoneyType::class, $this->getConfiguration("Prix de la voiture :"))
            ->add('nbproprio', NumberType::class, $this->getConfiguration("Nombre de propriétaires :"))
            ->add('cylindree', NumberType::class, $this->getConfiguration("Cylindrée de la voiture :"))
            ->add('puissance', NumberType::class, $this->getConfiguration("Puissance de la voiture :"))

            ->add('carburant', ChoiceType::class, [
                'choices' => [
                    'Essence' => 'Essence',
                    'Diesel' => 'Diesel',
                    'Electrique' => 'Electrique'
                ]
            ])

            ->add('transmission', choiceType::class, [
                'choices' => [
                    'Automatique' => 'Automatique',
                    'Manuelle' => 'Manuelle',
                ]
            ])
            ->add('description', TextareaType::class, $this->getConfiguration("Description de la voiture :"))
            ->add('texte', TextareaType::class, $this->getConfiguration("Si vous avez une information à rajouter : "))
            ->add('circ', NumberType::class, $this->getConfiguration("Type de circulation :"));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }

    private function getConfiguration($label): array
    {
        return [
            'label' => $label,
            // Autres options éventuelles...
        ];
    }
}
