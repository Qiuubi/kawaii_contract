<?php

namespace App\Entity;

use App\Repository\ContractRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContractRepository::class)]
class Contract
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $number;

    #[ORM\Column(type: 'string', length: 100)]
    private $name;

    #[ORM\Column(type: 'string', length: 100)]
    private $ourCompanyQuality;

    #[ORM\Column(type: 'string', length: 100)]
    private $partnerQuality;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'datetime_immutable')]
    private $createdAt;

    #[ORM\Column(type: 'string', length: 100)]
    private $purpose;

    #[ORM\Column(type: 'string', length: 100)]
    private $territory;

    #[ORM\Column(type: 'integer')]
    private $term;

    #[ORM\Column(type: 'date')]
    private $dateEffect;

    #[ORM\Column(type: 'date')]
    private $dateEnding;

    #[ORM\Column(type: 'integer')]
    private $price;

    #[ORM\Column(type: 'text', nullable: true)]
    private $priceRevision;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $applicableLaw;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $dispute;

    #[ORM\ManyToOne(targetEntity: Category::class)]
    private $category;

    #[ORM\ManyToOne(targetEntity: Company::class)]
    private $ourCompany;

    #[ORM\ManyToOne(targetEntity: Company::class)]
    private $partner;

    #[ORM\ManyToOne(targetEntity: Status::class)]
    private $status;

    #[ORM\ManyToOne(targetEntity: User::class)]
    private $user;

    #[ORM\Column(type: 'string', length: 100)]
    private $language;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $registration;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $marketingRate;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $reports;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $sellObjectives;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $stocks;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $retentionPeriod;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $noCompetition;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $sellInternet;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $supplyOrders;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $delivery;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $reception;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $payment;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $penalties;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $retentionTitle;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $liability;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $insurance;

    #[ORM\Column(type: 'text', nullable: true)]
    private $termination;

    #[ORM\Column(type: 'text', nullable: true)]
    private $terminationConsequences;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $partialInvalidity;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $entireAgreement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getOurCompanyQuality(): ?string
    {
        return $this->ourCompanyQuality;
    }

    public function setOurCompanyQuality(string $ourCompanyQuality): self
    {
        $this->ourCompanyQuality = $ourCompanyQuality;

        return $this;
    }

    public function getPartnerQuality(): ?string
    {
        return $this->partnerQuality;
    }

    public function setPartnerQuality(string $partnerQuality): self
    {
        $this->partnerQuality = $partnerQuality;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPurpose(): ?string
    {
        return $this->purpose;
    }

    public function setPurpose(string $purpose): self
    {
        $this->purpose = $purpose;

        return $this;
    }

    public function getTerritory(): ?string
    {
        return $this->territory;
    }

    public function setTerritory(string $territory): self
    {
        $this->territory = $territory;

        return $this;
    }

    public function getTerm(): ?int
    {
        return $this->term;
    }

    public function setTerm(int $term): self
    {
        $this->term = $term;

        return $this;
    }

    public function getDateEffect(): ?\DateTimeInterface
    {
        return $this->dateEffect;
    }

    public function setDateEffect(\DateTimeInterface $dateEffect): self
    {
        $this->dateEffect = $dateEffect;

        return $this;
    }

    public function getDateEnding(): ?\DateTimeInterface
    {
        return $this->dateEnding;
    }

    public function setDateEnding(\DateTimeInterface $dateEnding): self
    {
        $this->dateEnding = $dateEnding;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPriceRevision(): ?string
    {
        return $this->priceRevision;
    }

    public function setPriceRevision(?string $priceRevision): self
    {
        $this->priceRevision = $priceRevision;

        return $this;
    }

    public function getApplicableLaw(): ?string
    {
        return $this->applicableLaw;
    }

    public function setApplicableLaw(?string $applicableLaw): self
    {
        $this->applicableLaw = $applicableLaw;

        return $this;
    }

    public function getDispute(): ?string
    {
        return $this->dispute;
    }

    public function setDispute(?string $dispute): self
    {
        $this->dispute = $dispute;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getOurCompany(): ?Company
    {
        return $this->ourCompany;
    }

    public function setOurCompany(?Company $ourCompany): self
    {
        $this->ourCompany = $ourCompany;

        return $this;
    }

    public function getPartner(): ?Company
    {
        return $this->partner;
    }

    public function setPartner(?Company $partner): self
    {
        $this->partner = $partner;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getRegistration(): ?string
    {
        return $this->registration;
    }

    public function setRegistration(?string $registration): self
    {
        $this->registration = $registration;

        return $this;
    }

    public function getMarketingRate(): ?string
    {
        return $this->marketingRate;
    }

    public function setMarketingRate(?string $marketingRate): self
    {
        $this->marketingRate = $marketingRate;

        return $this;
    }

    public function getReports(): ?string
    {
        return $this->reports;
    }

    public function setReports(?string $reports): self
    {
        $this->reports = $reports;

        return $this;
    }

    public function getSellObjectives(): ?string
    {
        return $this->sellObjectives;
    }

    public function setSellObjectives(?string $sellObjectives): self
    {
        $this->sellObjectives = $sellObjectives;

        return $this;
    }

    public function getStocks(): ?string
    {
        return $this->stocks;
    }

    public function setStocks(?string $stocks): self
    {
        $this->stocks = $stocks;

        return $this;
    }

    public function getRetentionPeriod(): ?string
    {
        return $this->retentionPeriod;
    }

    public function setRetentionPeriod(?string $retentionPeriod): self
    {
        $this->retentionPeriod = $retentionPeriod;

        return $this;
    }

    public function getNoCompetition(): ?string
    {
        return $this->noCompetition;
    }

    public function setNoCompetition(?string $noCompetition): self
    {
        $this->noCompetition = $noCompetition;

        return $this;
    }

    public function getSellInternet(): ?string
    {
        return $this->sellInternet;
    }

    public function setSellInternet(?string $sellInternet): self
    {
        $this->sellInternet = $sellInternet;

        return $this;
    }

    public function getSupplyOrders(): ?string
    {
        return $this->supplyOrders;
    }

    public function setSupplyOrders(?string $supplyOrders): self
    {
        $this->supplyOrders = $supplyOrders;

        return $this;
    }

    public function getDelivery(): ?string
    {
        return $this->delivery;
    }

    public function setDelivery(?string $delivery): self
    {
        $this->delivery = $delivery;

        return $this;
    }

    public function getReception(): ?string
    {
        return $this->reception;
    }

    public function setReception(?string $reception): self
    {
        $this->reception = $reception;

        return $this;
    }

    public function getPayment(): ?string
    {
        return $this->payment;
    }

    public function setPayment(?string $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    public function getPenalties(): ?string
    {
        return $this->penalties;
    }

    public function setPenalties(?string $penalties): self
    {
        $this->penalties = $penalties;

        return $this;
    }

    public function getRetentionTitle(): ?string
    {
        return $this->retentionTitle;
    }

    public function setRetentionTitle(?string $retentionTitle): self
    {
        $this->retentionTitle = $retentionTitle;

        return $this;
    }

    public function getLiability(): ?string
    {
        return $this->liability;
    }

    public function setLiability(?string $liability): self
    {
        $this->liability = $liability;

        return $this;
    }

    public function getInsurance(): ?string
    {
        return $this->insurance;
    }

    public function setInsurance(?string $insurance): self
    {
        $this->insurance = $insurance;

        return $this;
    }

    public function getTermination(): ?string
    {
        return $this->termination;
    }

    public function setTermination(?string $termination): self
    {
        $this->termination = $termination;

        return $this;
    }

    public function getTerminationConsequences(): ?string
    {
        return $this->terminationConsequences;
    }

    public function setTerminationConsequences(?string $terminationConsequences): self
    {
        $this->terminationConsequences = $terminationConsequences;

        return $this;
    }

    public function getPartialInvalidity(): ?string
    {
        return $this->partialInvalidity;
    }

    public function setPartialInvalidity(?string $partialInvalidity): self
    {
        $this->partialInvalidity = $partialInvalidity;

        return $this;
    }

    public function getEntireAgreement(): ?string
    {
        return $this->entireAgreement;
    }

    public function setEntireAgreement(?string $entireAgreement): self
    {
        $this->entireAgreement = $entireAgreement;

        return $this;
    }
}
