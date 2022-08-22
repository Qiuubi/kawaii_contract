<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Status;
use App\Entity\Company;
use App\Entity\Product;
use App\Entity\Category;
use App\Entity\Contract;
use App\Repository\CompanyRepository;
use App\Repository\ProductRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ContractType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'number',
                TextType::class,
                [
                    'attr' => [
                        'required'   => true,
                        'placeholder' => ' ex. FBF202201',
                    ]
                ]
            )
            ->add(
                'name',
                TextType::class,
                [
                    'attr' => [
                        'required'   => true,
                        'placeholder' => ' ex. Entreprise - Partenaire',
                    ]
                ]
            )
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
            ])
            ->add('ourCompany', EntityType::class, [
                'class' => Company::class,
                'choice_label' => 'name',
                'query_builder' => function (CompanyRepository $er) {
                    return $er->createQueryBuilder('comp')
                        ->orderBy('comp.id', 'ASC')
                        ->setMaxResults(3);
                }
            ])
            ->add(
                'ourCompanyQuality',
                TextType::class,
                [
                    'attr' => [
                        'required'   => true,
                        'placeholder' => ' Distributeur, concédant...',
                    ]
                ]
            )
            ->add('partner', EntityType::class, [
                'class' => Company::class,
                'choice_label' => 'name',
                'query_builder' => function (CompanyRepository $er) {
                    return $er->createQueryBuilder('cat')
                        ->where('cat.id > 3')
                        ->orderBy('cat.id', 'ASC');
                }
            ])
            ->add(
                'partnerQuality',
                TextType::class,
                [
                    'attr' => [
                        'required'   => true,
                        'placeholder' => ' Distributeur, prestataire...',
                    ]
                ]
            )
            ->add('product', EntityType::class, [
                'class' => Product::class,
                'multiple' => true,
                'expanded' => true,
                'choice_label' => 'name',
                'query_builder' => function (ProductRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->orderBy('p.id', 'DESC');
                }
            ])
            ->add('description')
            // ->add('createdAt')
            ->add(
                'language',
                TextType::class,
                [
                    'attr' => [
                        'required'   => true,
                        'placeholder' => ' ex. français, anglais..',
                    ]
                ]
            )
            ->add(
                'purpose',
                TextType::class,
                [
                    'attr' => [
                        'required'   => true,
                        'placeholder' => ' ex. Distribution sélective..',
                    ]
                ]
            )
            ->add(
                'territory',
                TextType::class,
                [
                    'attr' => [
                        'required'   => true,
                        'placeholder' => ' ex. Chine, France..',
                    ]
                ]
            )
            ->add('term')
            ->add('dateEffect', DateType::class, [
                'format' => 'dd-MM-yyyy'
            ])
            ->add('dateEnding', DateType::class, [
                'format' => 'dd-MM-yyyy'
            ])

            ->add(
                'registration',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " ex. Le partenaire et à ses frais",
                    ]
                ]
            )
            ->add(
                'marketingRate',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " ex. progression de vente de 3% par an",
                    ]
                ]
            )
            ->add(
                'reports',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " ex. rapport chaque trimestre",
                    ]
                ]
            )
            ->add(
                'sellObjectives',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " ex. 100.000 ventes l'an 1",
                    ]
                ]
            )
            ->add(
                'stocks',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " ex. 10.000 produits",
                    ]
                ]
            )
            ->add(
                'retentionPeriod',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " ex. au moins 3 mois",
                    ]
                ]
            )
            ->add(
                'noCompetition',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " ex. sur toute la Chine",
                    ]
                ]
            )
            ->add(
                'sellInternet',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " ex. seulement les cosmétiques",
                    ]
                ]
            )

            ->add(
                'supplyOrders',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " ex. 3 mois après signature",
                    ]
                ]
            )
            ->add(
                'delivery',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " ex. 3 mois après commande",
                    ]
                ]
            )
            ->add(
                'reception',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " ex. dans les six mois après expédition",
                    ]
                ]
            )
            ->add(
                'retentionTitle',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " ex. transfert de propriété après réception",
                    ]
                ]
            )

            ->add(
                'price',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " ex. 250.000 €",
                    ]
                ]
            )
            ->add(
                'priceRevision',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " ex. révision au 1er septembre de chaque année",
                    ]
                ]
            )
            ->add(
                'payment',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " ex. 60 jours max après réception facture",
                    ]
                ]
            )

            ->add(
                'penalties',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " ex. 5% du prix par jour retard",
                    ]
                ]
            )
            ->add(
                'liability',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " Lister les manquements contractuels",
                    ]
                ]
            )
            ->add(
                'insurance',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " Assurer les produits ?",
                    ]
                ]
            )
            ->add(
                'termination',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " Modalités de résiliations",
                    ]
                ]
            )
            ->add(
                'terminationConsequences',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " retour des produits, destruction aux frais de qui ?",
                    ]
                ]
            )

            ->add(
                'partialInvalidity',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " Validité du contrat même si une clause est nulle",
                    ]
                ]
            )
            ->add(
                'entireAgreement',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " Les annexes ont une valeur contractuelle",
                    ]
                ]
            )
            ->add(
                'applicableLaw',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " Loi applicable de quel pays ?",
                    ]
                ]
            )
            ->add(
                'dispute',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => " Quel est le tribunal compétent ? ",
                    ]
                ]
            )

            ->add('status', EntityType::class, [
                'class' => Status::class,
                'choice_label' => 'name',
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'firstname',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contract::class,
        ]);
    }
}
