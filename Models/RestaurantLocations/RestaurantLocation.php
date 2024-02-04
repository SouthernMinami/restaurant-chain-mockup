<?php

namespace Models\RestaurantLocations;

class RestaurantLocation
{
    private $name;
    private $address;
    private $city;
    private $state;
    private $country;
    private $postalCode;
    private $isOpen;
    private $employees;

    public function __construct($name, $address, $city, $state, $country, $postalCode, $isOpen, $employees)
    {
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
        $this->postalCode = $postalCode;
        $this->isOpen = $isOpen;
        $this->employees = $employees;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getPostalCode()
    {
        return $this->postalCode;
    }

    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    public function getIsOpen()
    {
        return $this->isOpen;
    }

    public function setIsOpen($isOpen)
    {
        $this->isOpen = $isOpen;
    }

    public function getEmployees()
    {
        return $this->employees;
    }

    public function setEmployees($employees)
    {
        $this->employees = $employees;
    }

    public function printInfo(): void
    {
        printf("Name: {$this->name}\n Address: {$this->address}\n City: {$this->city}\n State: {$this->state}\n Country: {$this->country}\n Postal Code: {$this->postalCode}\n " . ($this->isOpen ? "Open" : "Closed") . "\n\n");
    }

    public function toString(): string
    {
        return sprintf(
            "Address: %s\nCity: %s\nState: %s\nCountry: %s\nPostal Code: %s\n%s\n\n",
            $this->address,
            $this->city,
            $this->state,
            $this->country,
            $this->postalCode,
            $this->isOpen ? "Open" : "Closed"
        );
    }

    public function toHTML(): string
    {
        return sprintf(
            "Address: %s<br>City: %s<br>State: %s<br>Country: %s<br>Postal Code: %s<br>%s<br><br>",
            $this->address,
            $this->city,
            $this->state,
            $this->country,
            $this->postalCode,
            $this->isOpen ? "Open" : "Closed"
        );
    }

    public function toArray(): array
    {
        return [
            "Address" => $this->address,
            "City" => $this->city,
            "State" => $this->state,
            "Country" => $this->country,
            "Postal Code" => $this->postalCode,
            "Open/Closed" => $this->isOpen
        ];
    }

    public function toJSON(): string
    {
        return json_encode($this->toArray());
    }

    public function toMarkdown(): string
    {
        return "- Address: {$this->address}\n
                - City: {$this->city}\n
                - State: {$this->state}\n
                - Country: {$this->country}\n
                - Postal Code: {$this->postalCode}\n
                - Open/Closed: {$this->isOpen}\n";
    }

}
