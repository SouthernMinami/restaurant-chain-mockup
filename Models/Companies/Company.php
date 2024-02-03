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
        printf("会社名: {$this->name}\n 設立年: {$this->publishYear}\n 業界: {$this->field}\n CEO: {$this->CEOName}\n 連絡先: {$this->phoneNumber}\n 企業概要: {$this->description}\n 株式公開: " . ($this->isPublicallyTraded ? "公開中" : "非公開") . "\n\n");
    }

    public function toString(): string
    {
        return sprintf(
            "会社名: %s\n設立年: %s\n業界: %s\nCEO: %s\n連絡先: %s\n企業概要: %s\n株式公開: %s\n\n",
            $this->name,
            $this->publishYear,
            $this->field,
            $this->CEOName,
            $this->phoneNumber,
            $this->description,
            $this->isPublicallyTraded ? "公開中" : "非公開"
        );
    }

    public function toHTML(): string
    {
        return sprintf(
            "会社名: %s<br>設立年: %s<br>業界: %s<br>CEO: %s<br>連絡先: %s<br>企業概要: %s<br>株式公開: %s<br><br>",
            $this->name,
            $this->publishYear,
            $this->field,
            $this->CEOName,
            $this->phoneNumber,
            $this->description,
            $this->isPublicallyTraded ? "公開中" : "非公開"
        );
    }

    public function toArray(): array
    {
        return [
            '会社名' => $this->name,
            '設立年' => $this->publishYear,
            '業界' => $this->field,
            'CEO' => $this->CEOName,
            '連絡先' => $this->phoneNumber,
            '企業概要' => $this->description,
            '株式公開' => $this->isPublicallyTraded ? "公開中" : "非公開",
        ];
    }

    public function toJSON(): string
    {
        return json_encode($this->toArray());
    }

    public function toMarkdown(): string
    {
        return "- 会社名: {$this->name}\n
                - 設立年: {$this->publishYear}\n
                - 業界: {$this->field}\n
                - CEO: {$this->CEOName}\n
                - 連絡先: {$this->phoneNumber}\n
                - 企業概要: {$this->description}\n
                - 株式公開: " . ($this->isPublicallyTraded ? "公開中" : "非公開") . "\n\n";
    }
}


