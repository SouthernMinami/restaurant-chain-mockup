<?php

namespace Models\Companies;

use Interfaces\FileConvertible;

class Company implements FileConvertible
{
    private $name;
    private $publishYear;
    private $description;
    private $phoneNumber;
    private $field;
    private $CEOName;
    private $isPublicallyTraded;

    public function __construct(
        string $name,
        int $publishYear,
        string $description,
        string $phoneNumber,
        string $field,
        string $CEOName,
        bool $isPublicallyTraded
    ) {
        $this->name = $name;
        $this->publishYear = $publishYear;
        $this->description = $description;
        $this->phoneNumber = $phoneNumber;
        $this->field = $field;
        $this->CEOName = $CEOName;
        $this->isPublicallyTraded = $isPublicallyTraded;
    }

    // Getters
    public function getName(): string
    {
        return $this->name;
    }

    public function getPublishYear(): int
    {
        return $this->publishYear;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function getField(): string
    {
        return $this->field;
    }

    public function getCEOName(): string
    {
        return $this->CEOName;
    }

    public function isPublicallyTraded(): bool
    {
        return $this->isPublicallyTraded;
    }

    // Setters
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setPublishYear(int $publishYear): void
    {
        $this->publishYear = $publishYear;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function setField(string $field): void
    {
        $this->field = $field;
    }

    public function setCEOName(string $CEOName): void
    {
        $this->CEOName = $CEOName;
    }

    public function setPublicallyTraded(bool $isPublicallyTraded): void
    {
        $this->isPublicallyTraded = $isPublicallyTraded;
    }

    public function printInfo(): void
    {
        printf("Company Name: {$this->name}\n Establishment Year: {$this->publishYear}\n Industry: {$this->field}\n CEO: {$this->CEOName}\n Contact Number: {$this->phoneNumber}\n Company Description: {$this->description}\n Publicly Traded: " . ($this->isPublicallyTraded ? "Yes" : "No") . "\n\n");
    }

    public function toString(): string
    {
        return sprintf(
            "Company Name: %s\nEstablishment Year: %s\nIndustry: %s\nCEO: %s\nContact Number: %s\nCompany Description: %s\nPublicly Traded: %s\n\n",
            $this->name,
            $this->publishYear,
            $this->field,
            $this->CEOName,
            $this->phoneNumber,
            $this->description,
            $this->isPublicallyTraded ? "Yes" : "No"
        );
    }

    public function toHTML(): string
    {
        return sprintf(
            "Company Name: %s<br>Establishment Year: %s<br>Industry: %s<br>CEO: %s<br>Contact Number: %s<br>Company Description: %s<br>Publicly Traded: %s<br><br>",
            $this->name,
            $this->publishYear,
            $this->field,
            $this->CEOName,
            $this->phoneNumber,
            $this->description,
            $this->isPublicallyTraded ? "Yes" : "No"
        );
    }

    public function toArray(): array
    {
        return [
            'Company Name' => $this->name,
            'Establishment Year' => $this->publishYear,
            'Industry' => $this->field,
            'CEO' => $this->CEOName,
            'Contact Number' => $this->phoneNumber,
            'Company Description' => $this->description,
            'Publicly Traded' => $this->isPublicallyTraded ? "Yes" : "No",
        ];
    }

    public function toJSON(): string
    {
        return json_encode($this->toArray());
    }

    public function toMarkdown(): string
    {
        return "- Company Name: {$this->name}\n
                    - Establishment Year: {$this->publishYear}\n
                    - Industry: {$this->field}\n
                    - CEO: {$this->CEOName}\n
                    - Contact Number: {$this->phoneNumber}\n
                    - Company Description: {$this->description}\n
                    - Publicly Traded: " . ($this->isPublicallyTraded ? "Yes" : "No") . "\n\n";
    }
}


