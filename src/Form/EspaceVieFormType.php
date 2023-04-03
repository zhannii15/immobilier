<?php

namespace App\Form;

use App\Entity\EspaceVie;
use App\Entity\Appartement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EspaceVieFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('parking')
            ->add('sde')
            ->add('sdb')
            ->add('ascenseur')
            ->add('coloc')
            ->add('appartement',EntityType::class,[
                'class'=>Appartement::class,
                'choice_label'=>'type',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EspaceVie::class,
        ]);
    }
}
