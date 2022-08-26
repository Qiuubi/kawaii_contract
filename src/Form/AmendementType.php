<?php

namespace App\Form;

use App\Entity\Amendement;
use App\Entity\Contract;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class AmendementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('term')
            ->add('dateEffect', DateType::class, [
                'format' => 'dd-MM-yyyy'
            ])
            ->add('dateEnding', DateType::class, [
                'format' => 'dd-MM-yyyy'
            ])
            ->add('newProvisions')
            ->add('contract', EntityType::class, [
                'class' => Contract::class,
                'choice_label' => 'name'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Amendement::class,
        ]);
    }
}
