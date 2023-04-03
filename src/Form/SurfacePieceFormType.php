<?php

namespace App\Form;

use App\Entity\Appartement;
use App\Entity\SurfacePiece;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SurfacePieceFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('m2_par_piece')
            ->add('appartement',EntityType::class,[
                'class'=>Appartement::class,
                'choice_label'=>'type',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SurfacePiece::class,
        ]);
    }
}
