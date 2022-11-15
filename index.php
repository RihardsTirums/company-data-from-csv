<?php

require_once 'vendor/autoload.php';
use App\Company;
use League\Csv\Reader;
use League\Csv\Statement;

//load the CSV document from a file path
$csv = Reader::createFromPath('register.csv');
$csv->setDelimiter(';');
$csv->setHeaderOffset(0);

$header = $csv->getHeader();

$companies = [];

//Show last 30 companys TOTAL COMPANYS = int(446088)
$showLastThirty = Statement::create()
    ->limit(30)
    ->offset(446058);
    ;

$records = $showLastThirty->process($csv);
foreach ($records as $record){
    $companies [] = new Company($record['name'], $record['regcode']);

}
echo "Please select !" . PHP_EOL;
echo "1.Find company details by name: " . PHP_EOL;
echo "2.Find company details by registration code: " .PHP_EOL;
echo "3.List last 30 records form CSV file" . PHP_EOL;
echo "4.Quit" . PHP_EOL;
$userInput = readline("Enter number to chose: ");

if ($userInput == 3){
    foreach ($companies as $company) {
        echo $company->companyDetails() . PHP_EOL;
    }
} else if($userInput == 2){
    echo "Enter company's registration code: ";
    $regCode = readline("Code ?: ");
    foreach ($companies as $company){
        if ($company->getRegistrationCode() === $regCode){
            echo $company->companyDetails();
        }
    }
} else if ($userInput == 1) {
    echo "Enter company's name: ";
    $compName = readline("Name ?: ");
    foreach ($companies as $company){
        if ($company->getName() === $compName){
            echo $company->companyDetails();
        }
    }
} else if ($userInput == 4){
    echo "You closed the application!" . PHP_EOL;
    exit;

}


/*foreach ($records as $record) {
    $companies [] = new Company($record['name'], $record['regcode']);
}*/



/*$registrationCode = readline("Enter company registration code to look up the company: ");*/

/*foreach ($companies as $company) {
    if ($company->getRegistrationCode() == $registrationCode) {
        var_dump($company);
    }
}*/





