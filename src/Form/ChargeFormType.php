<?php

namespace App\Form;

use App\Entity\Charges;
use App\Entity\Appartement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChargeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('loyer_mensuel')
            ->add('garantie_loyer')
            ->add('provision_charge')
            ->add('etat_des_lieux')
            ->add('appartement',EntityType::class,[
                'class'=>Appartement::class,
                'choice_label'=>'type',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Charges::class,
        ]);
    }
}
