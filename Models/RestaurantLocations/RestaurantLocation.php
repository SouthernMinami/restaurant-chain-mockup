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
        printf("店名: {$this->name}\n 住所: {$this->address}\n 市区町村: {$this->city}\n 州/都道府県: {$this->state}\n 国: {$this->country}\n 郵便番号: {$this->postalCode}\n " . ($this->isOpen ? "営業中" : "休業中") . "\n\n");
    }

    public function toString(): string
    {
        return sprintf(
            "住所: %s\n市区町村: %s\n州/都道府県: %s\n国: %s\n郵便番号: %s\n%s\n\n",
            $this->address,
            $this->city,
            $this->state,
            $this->country,
            $this->postalCode,
            $this->isOpen ? "営業中" : "休業中"
        );
    }

    public function toHTML(): string
    {
        return sprintf(
            "住所: %s<br>市区町村: %s<br>州/都道府県: %s<br>国: %s<br>郵便番号: %s<br>%s<br><br>",
            $this->address,
            $this->city,
            $this->state,
            $this->country,
            $this->postalCode,
            $this->isOpen ? "営業中" : "休業中"
        );
    }

    public function toArray(): array
    {
        return [
            "住所" => $this->address,
            "市区町村" => $this->city,
            "州/都道府県" => $this->state,
            "国" => $this->country,
            "郵便番号" => $this->postalCode,
            "営業/休業" => $this->isOpen
        ];
    }

    public function toJSON(): string
    {
        return json_encode($this->toArray());
    }

    public function toMarkdown(): string
    {
        return "- 住所: {$this->address}\n
                - 市区町村: {$this->city}\n
                - 州/都道府県: {$this->state}\n
                - 国: {$this->country}\n
                - 郵便番号: {$this->postalCode}\n
                - 営業/休業: {$this->isOpen}\n";
    }

}
