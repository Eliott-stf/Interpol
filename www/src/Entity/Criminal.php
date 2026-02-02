<?php

namespace App\Entity;

use App\Repository\CriminalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CriminalRepository::class)]
class Criminal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $name = null;

    #[ORM\Column(length: 150)]
    private ?string $lastname = null;

    #[ORM\Column]
    private ?\DateTime $birthDate = null;

    #[ORM\Column(nullable: true)]
    private ?int $height = null;

    #[ORM\Column(nullable: true)]
    private ?int $weight = null;

    #[ORM\Column]
    private ?bool $isCaptured = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $feature = null;

    #[ORM\Column]
    private ?\DateTime $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $UpdatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'criminals')]
    private ?HairColor $hairColor = null;

    #[ORM\ManyToOne(inversedBy: 'criminals')]
    private ?EyesColor $eyesColor = null;

    #[ORM\ManyToOne(inversedBy: 'criminals')]
    private ?SkinColor $skinColor = null;

    #[ORM\ManyToOne(inversedBy: 'criminals')]
    private ?Gender $gender = null;

    #[ORM\ManyToOne(inversedBy: 'criminals')]
    private ?BirthPlace $birthPlace = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Media $media = null;

    /**
     * @var Collection<int, Nationality>
     */
    #[ORM\ManyToMany(targetEntity: Nationality::class, inversedBy: 'criminals')]
    private Collection $nationality;

    /**
     * @var Collection<int, Charge>
     */
    #[ORM\ManyToMany(targetEntity: Charge::class, inversedBy: 'criminals')]
    private Collection $charge;

    /**
     * @var Collection<int, SpokenLanguage>
     */
    #[ORM\ManyToMany(targetEntity: SpokenLanguage::class, inversedBy: 'criminals')]
    private Collection $spokenLanguage;

    /**
     * @var Collection<int, Report>
     */
    #[ORM\OneToMany(targetEntity: Report::class, mappedBy: 'criminal')]
    private Collection $reports;

    public function __construct()
    {
        $this->nationality = new ArrayCollection();
        $this->charge = new ArrayCollection();
        $this->spokenLanguage = new ArrayCollection();
        $this->reports = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getBirthDate(): ?\DateTime
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTime $birthDate): static
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(?int $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    public function isCaptured(): ?bool
    {
        return $this->isCaptured;
    }

    public function setIsCaptured(bool $isCaptured): static
    {
        $this->isCaptured = $isCaptured;

        return $this;
    }

    public function getFeature(): ?string
    {
        return $this->feature;
    }

    public function setFeature(?string $feature): static
    {
        $this->feature = $feature;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->UpdatedAt;
    }

    public function setUpdatedAt(?\DateTime $UpdatedAt): static
    {
        $this->UpdatedAt = $UpdatedAt;

        return $this;
    }

    public function getHairColor(): ?HairColor
    {
        return $this->hairColor;
    }

    public function setHairColor(?HairColor $hairColor): static
    {
        $this->hairColor = $hairColor;

        return $this;
    }

    public function getEyesColor(): ?EyesColor
    {
        return $this->eyesColor;
    }

    public function setEyesColor(?EyesColor $eyesColor): static
    {
        $this->eyesColor = $eyesColor;

        return $this;
    }

    public function getSkinColor(): ?SkinColor
    {
        return $this->skinColor;
    }

    public function setSkinColor(?SkinColor $skinColor): static
    {
        $this->skinColor = $skinColor;

        return $this;
    }

    public function getGender(): ?Gender
    {
        return $this->gender;
    }

    public function setGender(?Gender $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getBirthPlace(): ?BirthPlace
    {
        return $this->birthPlace;
    }

    public function setBirthPlace(?BirthPlace $birthPlace): static
    {
        $this->birthPlace = $birthPlace;

        return $this;
    }

    public function getMedia(): ?Media
    {
        return $this->media;
    }

    public function setMedia(?Media $media): static
    {
        $this->media = $media;

        return $this;
    }

    /**
     * @return Collection<int, Nationality>
     */
    public function getNationality(): Collection
    {
        return $this->nationality;
    }

    public function addNationality(Nationality $nationality): static
    {
        if (!$this->nationality->contains($nationality)) {
            $this->nationality->add($nationality);
        }

        return $this;
    }

    public function removeNationality(Nationality $nationality): static
    {
        $this->nationality->removeElement($nationality);

        return $this;
    }

    /**
     * @return Collection<int, Charge>
     */
    public function getCharge(): Collection
    {
        return $this->charge;
    }

    public function addCharge(Charge $charge): static
    {
        if (!$this->charge->contains($charge)) {
            $this->charge->add($charge);
        }

        return $this;
    }

    public function removeCharge(Charge $charge): static
    {
        $this->charge->removeElement($charge);

        return $this;
    }

    /**
     * @return Collection<int, SpokenLanguage>
     */
    public function getSpokenLanguage(): Collection
    {
        return $this->spokenLanguage;
    }

    public function addSpokenLanguage(SpokenLanguage $spokenLanguage): static
    {
        if (!$this->spokenLanguage->contains($spokenLanguage)) {
            $this->spokenLanguage->add($spokenLanguage);
        }

        return $this;
    }

    public function removeSpokenLanguage(SpokenLanguage $spokenLanguage): static
    {
        $this->spokenLanguage->removeElement($spokenLanguage);

        return $this;
    }

    /**
     * @return Collection<int, Report>
     */
    public function getReports(): Collection
    {
        return $this->reports;
    }

    public function addReport(Report $report): static
    {
        if (!$this->reports->contains($report)) {
            $this->reports->add($report);
            $report->setCriminal($this);
        }

        return $this;
    }

    public function removeReport(Report $report): static
    {
        if ($this->reports->removeElement($report)) {
            // set the owning side to null (unless already changed)
            if ($report->getCriminal() === $this) {
                $report->setCriminal(null);
            }
        }

        return $this;
    }
}
