<?php

namespace App\Entity;

use App\Repository\StudyRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

#[ORM\Entity(repositoryClass: StudyRepository::class)]
class Study
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[NotBlank]
    #[Length(max: 255, maxMessage: "Le nom du diplôme ou du titre' ne peux excéder 50 caratères")]
    private ?string $degreeName = null;

    #[ORM\Column(length: 100)]
    #[NotBlank]
    #[Length(max: 255, maxMessage: "Le nom de l'école ne peux excéder 50 caratères")]
    private ?string $schoolName = null;

    #[ORM\Column(length: 255)]
    private ?string $schoolLogo = null;

    #[ORM\Column(length: 50)]
    #[NotBlank]
    #[Choice(['En cours', 'Obtenu'])]
    private ?string $degreeState = null;

    #[ORM\Column(length: 50)]
    #[NotBlank]
    #[Length(max: 50, maxMessage: "Le nom de l'école ne peux excéder 50 caratères")]
    private ?string $localization = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDegreeName(): ?string
    {
        return $this->degreeName;
    }

    public function setDegreeName(string $degreeName): static
    {
        $this->degreeName = $degreeName;

        return $this;
    }

    public function getSchoolName(): ?string
    {
        return $this->schoolName;
    }

    public function setSchoolName(string $schoolName): static
    {
        $this->schoolName = $schoolName;

        return $this;
    }

    public function getDegreeState(): ?string
    {
        return $this->degreeState;
    }

    public function setDegreeState(string $degreeState): static
    {
        $this->degreeState = $degreeState;

        return $this;
    }

    public function getLocalization(): ?string
    {
        return $this->localization;
    }

    public function setLocalization(string $localization): static
    {
        $this->localization = $localization;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getSchoolLogo(): ?string
    {
        return $this->schoolLogo;
    }

    public function setSchoolLogo(?string $schoolLogo): void
    {
        $this->schoolLogo = $schoolLogo;
    }
}
