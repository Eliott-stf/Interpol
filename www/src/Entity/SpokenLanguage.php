<?php

namespace App\Entity;

use App\Repository\SpokenLanguageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpokenLanguageRepository::class)]
class SpokenLanguage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $label = null;

    /**
     * @var Collection<int, Criminal>
     */
    #[ORM\ManyToMany(targetEntity: Criminal::class, mappedBy: 'spokenLanguage')]
    private Collection $criminals;

    public function __construct()
    {
        $this->criminals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): static
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection<int, Criminal>
     */
    public function getCriminals(): Collection
    {
        return $this->criminals;
    }

    public function addCriminal(Criminal $criminal): static
    {
        if (!$this->criminals->contains($criminal)) {
            $this->criminals->add($criminal);
            $criminal->addSpokenLanguage($this);
        }

        return $this;
    }

    public function removeCriminal(Criminal $criminal): static
    {
        if ($this->criminals->removeElement($criminal)) {
            $criminal->removeSpokenLanguage($this);
        }

        return $this;
    }
}
