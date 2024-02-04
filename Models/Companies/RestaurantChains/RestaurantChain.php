<?php

namespace Models\Companies\RestaurantChains;

use Interfaces\FileConvertible;
use Models\Companies\Company;
use Models\RestaurantLocations\RestaurantLocation;

class RestaurantChain extends Company implements FileConvertible
{
    private $chainId;
    private $restaurantLocations;
    private $cuisineType;
    private $numberOfLocations;
    private $hasDriveThru;
    private $parentCompany;

    public function __construct(
        string $name,
        int $publishYear,
        string $description,
        string $phoneNumber,
        string $field,
        string $CEOName,
        bool $isPublicallyTraded,
        int $chainId,
        array $restaurantLocations,
        string $cuisineType,
        int $numberOfLocations,
        int $hasDriveThru,
        string $parentCompany
    ) {
        parent::__construct($name, $publishYear, $description, $phoneNumber, $field, $CEOName, $isPublicallyTraded);
        $this->chainId = $chainId;
        $this->restaurantLocations = $restaurantLocations;
        $this->cuisineType = $cuisineType;
        $this->numberOfLocations = $numberOfLocations;
        $this->hasDriveThru = $hasDriveThru;
        $this->parentCompany = $parentCompany;
    }

    public function getChainId(): int
    {
        return $this->chainId;
    }

    public function getRestaurantLocations(): array
    {
        return $this->restaurantLocations;
    }

    public function getCuisineType(): string
    {
        return $this->cuisineType;
    }

    public function getNumberOfLocations(): int
    {
        return $this->numberOfLocations;
    }

    public function getHasDriveThru(): bool
    {
        return $this->hasDriveThru;
    }

    public function getParentCompany(): string
    {
        return $this->parentCompany;
    }

    public function setRestaurantLocations(array $restaurantLocations)
    {
        $this->restaurantLocations = $restaurantLocations;
    }

    public function setCuisineType(string $cuisineType)
    {
        $this->cuisineType = $cuisineType;
    }

    public function setNumberOfLocations(int $numberOfLocations)
    {
        $this->numberOfLocations = $numberOfLocations;
    }

    public function setHasDriveThru(bool $hasDriveThru)
    {
        $this->hasDriveThru = $hasDriveThru;
    }

    public function setParentCompany(string $parentCompany)
    {
        $this->parentCompany = $parentCompany;
    }

    public function addRestaurantLocation(RestaurantLocation $restaurantLocation)
    {
        array_push($this->restaurantLocations, $restaurantLocation);
    }

    public function showRestaurantLocations(
    ): void {
        foreach ($this->restaurantLocations as $restaurantLocation) {
            $restaurantLocation->printInfo();
        }
    }

    public function toString(): string
    {
        return
            "ID: {$this->chainId}\n" .
            "Cuisine Type: {$this->cuisineType}\n" .
            "Number of Locations: {$this->numberOfLocations}\n" .
            "Drive-Thru: {$this->hasDriveThru}\n" .
            "Parent Company: {$this->parentCompany}\n" .
            parent::toString();
    }

    public function toHTML(): string
    {
        return
            '
                <p>ID: ' . $this->chainId . '</p><br>
                <p>Cuisine Type: ' . $this->cuisineType . '</p><br>
                <p>Number of Locations: ' . $this->numberOfLocations . '</p><br>
                <p>Drive-Thru: ' . ($this->hasDriveThru ? "Yes" : "No") . '</p><br>
                <p>Parent Company: ' . $this->parentCompany . '</p><br>
                <p>' . parent::toHTML() . '</p>
            ';

    }

    public function toArray(): array
    {
        return [

            "ID" => $this->chainId,
            "Cuisine Type" => $this->cuisineType,
            "Number of Locations" => $this->numberOfLocations,
            "Drive-Thru" => $this->hasDriveThru,
            "Parent Company" => $this->parentCompany,
        ] + parent::toArray();
    }

    public function toJSON(): string
    {
        return json_encode($this->toArray());
    }

    public function toMarkdown(): string
    {
        return
            "- ID: {$this->chainId}\n" .
            "- Cuisine Type: {$this->cuisineType}\n" .
            "- Number of Locations: {$this->numberOfLocations}\n" .
            "- Drive-Thru: " . ($this->hasDriveThru ? "Yes" : "No") . "\n" .
            "- Parent Company: {$this->parentCompany}\n" .
            parent::toMarkdown();
    }
}