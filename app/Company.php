<?php
namespace App;

class Company {
    private string $name;
    private string $registrationCode;
    private array $companyData;


    public function __construct(string $name, string $registrationCode){
        $this->name = $name;
        $this->registrationCode = $registrationCode;
       // $this->companyData = $companyData;

    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getRegistrationCode(): string
    {
        return $this->registrationCode;
    }

    public function companyDetails() : string {
        return "Company Name: ".$this->getName(). " Registration Code: ". $this->getRegistrationCode();

    }





}