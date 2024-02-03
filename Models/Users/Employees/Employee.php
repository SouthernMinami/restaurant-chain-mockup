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
        printf("氏名: %s %s\n 職業: %s\n 給与: %s\n 業務開始日: %s\n 賞与: %s\n\n", $this->getFirstName(), $this->getLastName(), $this->occupation, $this->salary, $this->startDate->format("Y-m-d"), $this->rewardsList);
    }

    public function __toString(): string
    {
        return sprintf(
            "職業: %s\n 給与: %s\n 業務開始日: %s\n 賞与: %s\n\n",
            $this->getOccupation(),
            $this->getSalary(),
            $this->getStartDate()->format('Y-m-d'),
            implode(", ", $this->getRewardsList())
        );
    }

    public function toHTML(): string
    {
        return sprintf(
            "<p>職業: %s<br>給与: %s<br>業務開始日: %s<br>賞与: %s<br></p>",
            $this->getOccupation(),
            $this->getSalary() . "円",
            $this->getStartDate()->format('Y-m-d'),
            implode(', ', $this->getRewardsList())
        );
    }
    public function toArray(): array
    {
        return [
            "職業" => $this->occupation,
            "給与" => $this->salary,
            "業務開始日" => $this->startDate,
            "賞与" => implode(", ", $this->getRewardsList())
        ];
    }

    public function toJSON(): string
    {
        return json_encode($this->toArray());
    }

    public function toMarkdown(): string
    {
        return "- 氏名: {$this->getFirstName()} {$this->getLastName()}\n" .
            "- 職業: {$this->occupation}\n" .
            "- 給与: {$this->salary}\n" .
            "- 業務開始日: {$this->startDate}\n" .
            "- 賞与: " . implode(", ", $this->getRewardsList()) . "\n";
    }
}
