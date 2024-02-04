<?php

namespace Models\Users\Employees;

use Interfaces\FileConvertible;
use Models\Users\User;
use DateTime;

class Employee extends User implements FileConvertible
{
    private $occupation;
    private $salary;
    private $startDate;
    private $rewardsList;

    public function __construct(int $id, string $firstName, string $lastName, string $email, string $password, string $phoneNumber, string $address, DateTime $birthDate, DateTime $membershipExpirationDate, string $role, string $salary, DateTime $startDate, array $rewardsList)
    {
        parent::__construct($id, $firstName, $lastName, $email, $password, $phoneNumber, $address, $birthDate, $membershipExpirationDate, $role);

        $this->occupation = $role;
        $this->startDate = $startDate;
        $this->salary = $salary;
        $this->rewardsList = $rewardsList;
    }


    public function getOccupation()
    {
        return $this->occupation;
    }

    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function getstartDate()
    {
        return $this->startDate;
    }

    public function setstartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    public function getRewardsList()
    {
        return $this->rewardsList;
    }

    public function setRewardsList($rewardsList)
    {
        $this->rewardsList = $rewardsList;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function printInfo(): void
    {
        printf("Name: %s %s\n Occupation: %s\n Salary: $%s\n Start Date: %s\n Rewards: %s\n\n", $this->getFirstName(), $this->getLastName(), $this->occupation, $this->salary, $this->startDate->format("Y-m-d"), $this->rewardsList);
    }

    public function __toString(): string
    {
        return sprintf(
            "Occupation: %s\n Salary: $%s\n Start Date: %s\n Rewards: %s\n\n",
            $this->getOccupation(),
            $this->getSalary(),
            $this->getStartDate()->format('Y-m-d'),
            implode(", ", $this->getRewardsList())
        );
    }

    public function toHTML(): string
    {
        return sprintf(
            "<p>Occupation: %s<br>Salary: $%s<br>Start Date: %s<br>Rewards: %s<br></p>",
            $this->getOccupation(),
            $this->getSalary() . ' / yr',
            $this->getStartDate()->format('Y-m-d'),
            implode(', ', $this->getRewardsList())
        );
    }
    public function toArray(): array
    {
        return [
            "Occupation" => $this->occupation,
            "Salary" => $this->salary,
            "Start Date" => $this->startDate,
            "Rewards" => implode(", ", $this->getRewardsList())
        ];
    }

    public function toJSON(): string
    {
        return json_encode($this->toArray());
    }

    public function toMarkdown(): string
    {
        return "- Name: {$this->getFirstName()} {$this->getLastName()}\n" .
            "- Occupation: {$this->occupation}\n" .
            "- Salary: $this->salary\n" .
            "- Start Date: {$this->startDate}\n" .
            "- Rewards: " . implode(", ", $this->getRewardsList()) . "\n";
    }
}
