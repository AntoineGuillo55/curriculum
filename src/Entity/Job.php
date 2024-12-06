<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\LessThan;
use Symfony\Component\Validator\Constraints\NotBlank;

#[ORM\Entity(repositoryClass: JobRepository::class)]
class Job
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[NotBlank]
    #[Length(max: 50, maxMessage: "L'intitulé du poste ne peux excéder 50 caratères")]
    private ?string $jobTitle = null;

    #[ORM\Column(length: 50)]
    #[NotBlank]
    #[Length(max: 50, maxMessage: "Le nom de la société ne peux excéder 50 caratères")]
    private ?string $companyName = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $companyLogo = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $memoryPhoto = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Length(min: 50, minMessage: 'Si renseignée, la description du poste doit contenir au moins 50 caractère' )]
    private ?string $description = null;

    #[ORM\Column(length: 20)]
    private ?string $contractType = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[LessThan(propertyPath: 'dateEnd')]
    private ?\DateTimeInterface $dateStart = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[GreaterThan(propertyPath: "dateStart")]
    private ?\DateTimeInterface $dateEnd = null;

    #[ORM\Column(length: 50)]
    #[Length(max: 50, maxMessage: "La localisation de la société ne peux excéder 50 caratères")]
    private ?string $localization = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function setJobTitle(string $jobTitle): static
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): static
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getContractType(): ?string
    {
        return $this->contractType;
    }

    public function setContractType(string $contractType): static
    {
        $this->contractType = $contractType;

        return $this;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->dateStart;
    }

    public function setDateStart(\DateTimeInterface $dateStart): static
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(?\DateTimeInterface $dateEnd): static
    {
        $this->dateEnd = $dateEnd;

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

    public function getCompanyLogo(): ?string
    {
        return $this->companyLogo;
    }

    public function setCompanyLogo(?string $companyLogo): void
    {
        $this->companyLogo = $companyLogo;
    }

    public function getMemoryPhoto(): ?string
    {
        return $this->memoryPhoto;
    }

    public function setMemoryPhoto(?string $memoryPhoto): void
    {
        $this->memoryPhoto = $memoryPhoto;
    }
}
