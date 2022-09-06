<?php

namespace App\DataFixtures;

use App\Entity\Amendement;
use Faker\Factory;
use App\Entity\User;
use App\Entity\Brand;
use App\Entity\Company;
use App\Entity\Product;
use App\Entity\Category;
use App\Entity\Contract;
use App\Entity\ProductDetail;
use App\Entity\Status;
use Bluemmb\Faker\PicsumPhotosProvider;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager,): void
    {

        $faker = Factory::create();
        $faker->addProvider(new PicsumPhotosProvider($faker));

        // $product = new Product();
        // $manager->persist($product);
        // I. User
        $user = new User();
        $user->setLastname("Nguyen")
            ->setFirstname("Quang")
            ->setEmail("quang.nguyen@lessencedesnotes.com")
            ->setRoles(["ROLE_ADMIN"])
            ->setPassword($this->passwordHasher->hashPassword(
                $user,
                'admin'
            ));
        $manager->persist($user);

        // II. Category
        /* */
        $categoryName = [
            "Distribution", "Partenariat", "Vente", "Accord de confidentialité", "Prestation de services"
        ];
        $categoryDescrip = [
            "Contrat par lequel un fournisseur vend ses produits et services à un distributeur qui vend lesdits produits aux consommateurs",
            "Contrat par lequel les parties conviennent de mettre leurs efforts en commun pour parvenir à un objectif commun",
            "Contrat par lequel un vendeur transfère la propriété d'un bien à un acheteur qui paye le prix",
            "Accord par lequel les parties conviennent de définir le paramètre des informations confidentielles qu'ils viennent à recevoir et à manipuler",
            "Contrat par lequel un prestataire effectue un service à un client qui en paye le prix"
        ];
        $categoryColor = [
            "#CCFFCC", "#CCFFFF", "#FFE6CC", "#CCCCFF", "#FFCCFF"
        ];

        for ($i = 0; $i < count($categoryColor); $i++) {
            $category = new Category;
            $category->setName($categoryName[$i])
                ->setDescription($categoryDescrip[$i])
                ->setColor($categoryColor[$i]);
            $manager->persist($category);
        }

        // III. Company 
        /*
        $CompanyName = ["EHM Healthcare", "FIMEX International", "Fragrance et Beauté Françaises", "Nhat Minh Duong"];
        $CompanyActivity = ["Médical et pharmaceutique", "Gestion et administration", "Cosmétique et parfums", "Cosmétique et parfums"];
        $CompanyNbRegis = ["84059841100014", "44065889600046", "51332417800039", "Néant"];
        $CompanyLegalRepresentative = ["Huong MANGIN", "Huong MANGIN", "Huong MANGIN", "Huong MANGIN"];
        $CompanyAddress = ["117 Avenue du Sidobre", "117 Avenue du Sidobre", "117 Avenue du Sidobre", "183 Dien Bien Phu Street, Ward 15, Binh Tranh District"];
        $CompanyZipCode = [81100, 81100, 81100, 00000];
        $CompanyCity = ["Castres", "Castres", "Castres", "Ho Chi Minh City"];
        $CompanyCountry = ["France", "France", "France", "Vietnam"];
        */

        for ($i = 0; $i < 20; $i++) {
            $company = new Company;
            $company->setName($faker->company())
                ->setActivity($faker->bs())
                ->setAddress($faker->streetAddress())
                ->setNumberRegistration($faker->randomNumber(9, true))
                ->setLegalRepresentative($faker->name())
                ->setZipCode($faker->postcode())
                ->setCity($faker->city())
                ->setCountry($faker->country());
            $manager->persist($company);
        }

        // IV. Brand
        for ($i = 0; $i < 30; $i++) {
            $brand = new Brand;
            $brand->setName($faker->lastName())
                ->setDescription($faker->paragraph())
                // ->setCompany($faker->$brandCompany);
                ->setCompany($company);
            $manager->persist($brand);
        }

        // V. Product
        for ($i = 0; $i < 80; $i++) {
            $product = new Product;
            $product->setName($faker->lastName())
                ->setCollection($faker->lastName())
                ->setCapacity($faker->numberBetween(20, 200))
                ->setPrice($faker->numberBetween(30, 80))
                ->setImg($faker->imageUrl($faker->numberBetween(100, 500)))
                ->setBrand($brand);
            $manager->persist($product);
        }

        // VI. Status
        $statusName = ["Négociation", "En cours", "Renouvelé", "A mettre fin", "Fin", "Archivé"];
        $statusDescription = ["Discussion, négociations contractuelles entre l'entreprise et le partenaire", "Le contrat est signé et il est exécuté. Nous avons respectivement des obligations l'un pour l'autre", "Le contrat est reconduit", "Le contrat ne sera pas renouvelé", "Le contrat est arrivé à son terme", "5 ans après son terme, le contrat peut être archivé et on ne peut plus s'en prévaloir, sauf en matière de preuve"];
        $statusColor = ["#AFE0D7", "#CCFFCC", "#69C8E5", "#92B992", "#FF9393", "#E0E0E0"];

        for ($i = 0; $i < count($statusName); $i++) {
            $status = new Status;
            $status->setName($statusName[$i])
                ->setDescription($statusDescription[$i])
                ->setColor($statusColor[$i]);
            $manager->persist($status);
        }

        // VII. Contract
        for ($i = 0; $i < 20; $i++) {
            $contract = new Contract;
            $contract->setNumber($faker->randomElement(['FBF', 'EHM']) . "-" . $faker->year() . $faker->numberBetween(0, 100))
                ->setName($faker->randomElement(['FBF', 'EHM']) . " - " . $faker->company())
                ->setLanguage($faker->randomElement(["Français", "Anglais"], 1))
                ->setOurCompanyQuality($faker->randomElement(["Distributeur", "Concédant", "Vendeur", "Client"], 1))
                ->setPartnerQuality($faker->randomElement(["Concédant", "Distributor", "Vendeur", "Client"], 1))
                ->setDescription($faker->paragraph())
                ->setCreatedAt(new \DateTimeImmutable)
                ->setPurpose($faker->randomElement(["Distribution exclusive sur le territoire", "Distribution semi-exclusive sur le territoire", "Prestation de service", "Vente d'un bien"], 1))
                ->setTerritory($faker->country())
                ->setTerm($faker->numberBetween(1, 10))
                ->setDateEffect($faker->dateTime())
                ->setDateEnding($faker->dateTime())
                ->setRegistration($faker->randomElement(["L'enregistrement incombe au Distributeur", "L'enregistrement incombe au Concédant"], 1))
                ->setMarketingRate($faker->randomElement(["3% par an", "5% par an"], 1))
                ->setReports("Un rapport tous les trimestres")
                ->setSellObjectives($faker->randomElement(["3% par an", "5% par an"], 1))
                ->setStocks($faker->randomElement(["constitution 3 mois de stock avant commande", "constitution 5 mois de stock avant commande"], 1))
                ->setNoCompetition($faker->randomElement(["Monopole sur tout le territoire", "Monopole sur tout le territoire et pays voisins"], 1))
                ->setSellInternet("Vente sur internet autorisée")
                ->setSupplyOrders($faker->randomElement(["Commande 3 mois après la signature ou la date d'anniversaire", "Commande 5 mois après la signature ou la date d'anniversaire"], 1))
                ->setRetentionPeriod($faker->randomElement(["Conservation des produits pendant au moins 3 mois", "Conservation des produits pendant au moins 5 mois"], 1))
                ->setDelivery($faker->randomElement(["Livraison 3 mois après acceptation de la commande", "Livraison 5 mois après acceptation de la commande"], 1))
                ->setReception($faker->randomElement(["Réception maximum 6 mois après acceptation de la commande", "Réception maximum 6 mois après acceptation de la commande"], 1))
                ->setPrice($faker->numberBetween(5000, 20000))
                ->setPriceRevision($faker->randomElement(["Révision chaque 1er septembre de l'année", "Révision chaque 1er juillet de l'année"], 1))
                ->setPayment($faker->randomElement(["Paiement par virement bancaire, 50% au moment de la signature, 50% au moment de la réception", "Paiement par virement bancaire, 25% au moment de la signature, 75% au moment de la réception"], 1))
                ->setPenalties($faker->randomElement(["1% du prix pour chaque jour de retard de paiement", "5% du prix pour chaque jour de retard de paiement"], 1))
                ->setRetentionTitle($faker->randomElement(["Transfert de propriété dès réception par la partie", "Transfert de propriété dès arrivée dans l'entrepôt avant livraison"], 1))
                ->setLiability($faker->randomElement(["Responsabilité en cas de dommages", "Responsabilité en cas de manquement contractuel"], 1))
                ->setInsurance("Assurer sur l'ensemble des produits objets de la vente", "Responsabilité en cas de manquement contractuel")
                ->setTermination("Résiliation en cas de manquement grave d'une obligation essentielle, procédure collective pour une des parties, absence de paiment au bout de 3 mois")
                ->setTerminationConsequences("Destruction des produits, retour des produits aux frais de l'une des parties ")
                ->setApplicableLaw("la loi " . $faker->randomElement(["française", "suisse", "chinoise", "anglaise"], 1) . " qui s'applique")
                ->setDispute($faker->sentence())
                ->setPartialInvalidity("En cas de nullité partielle du contrat, les autres clauses restent valables")
                ->setEntireAgreement("Le contrat couvre le contrat en lui-même et ses annexes, sauf documents antérieurs. En cas de contradiction entre les annexes et le contrat, ce dernier prévaut")
                ->setCategory($category)
                ->setOurCompany($company)
                ->setPartner($company)
                ->setUser($user)
                ->setStatus($status);
            $manager->persist($contract);
        }

        // VIII. Amendement
        for ($i = 0; $i < 50; $i++) {
            $amendement = new Amendement;
            $amendement->setName($faker->randomElement(['FBF', 'EHM']) . "-" . $faker->company())
                ->setDescription($faker->paragraph())
                ->setTerm($faker->numberBetween(1, 10))
                ->setNewProvisions($faker->paragraph())
                ->setDateEffect($faker->dateTime())
                ->setDateEnding($faker->dateTime())
                ->setCreatedAt(new \DateTimeImmutable)
                // ->setContract($faker->randomElement($amendementContract));
                ->setContract($contract);
            $manager->persist($amendement);
        }

        // IX. ProductDetail
        for ($i = 0; $i < 100; $i++) {
            $productDetail = new ProductDetail;
            // $productDetail->setContract($faker->randomElement($amendementContract))
            //     ->setProduct($faker->randomElement($productDetailProducts));
            $productDetail->setContract($contract)
                ->setProduct($product);
            $manager->persist($productDetail);
        }

        $manager->flush();
    }

    // php bin/console doctrine:fixtures:load
}
