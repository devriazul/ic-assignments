<?php

class Transaction {
    public $amount;
    public $category;

    public function __construct($amount, $category) {
        $this->amount = $amount;
        $this->category = $category;
    }
}

class Income extends Transaction {}
class Expense extends Transaction {}

class BudgetManager {
    private $incomes = [];
    private $expenses = [];
    private $categories = [];
    private $incomeFile = 'incomes.json';
    private $expenseFile = 'expenses.json';
    private $categoryFile = 'categories.json';

    public function __construct() {
        $this->incomes = $this->loadData($this->incomeFile);
        $this->expenses = $this->loadData($this->expenseFile);
        $this->categories = $this->loadData($this->categoryFile);
    }

    private function loadData($filename) {
        if (file_exists($filename)) {
            $jsonData = file_get_contents($filename);
            return json_decode($jsonData, true) ?? [];
        }
        return [];
    }

    private function saveData($filename, $data) {
        $jsonData = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($filename, $jsonData);
    }

    public function addIncome($amount, $category) {
        $income = ["amount" => $amount, "category" => $category];
        $this->incomes[] = $income;
        $this->saveData($this->incomeFile, $this->incomes);
    }

    public function addExpense($amount, $category) {
        $expense = ["amount" => $amount, "category" => $category];
        $this->expenses[] = $expense;
        $this->saveData($this->expenseFile, $this->expenses);
    }

    public function viewIncomes() {
        return $this->incomes;
    }

    public function viewExpenses() {
        return $this->expenses;
    }

    public function viewCategories() {
        $categories = array_unique(array_merge(
            array_column($this->incomes, 'category'),
            array_column($this->expenses, 'category')
        ));
        return $categories;
    }

    public function viewSavings() {
        $totalIncome = array_sum(array_column($this->incomes, 'amount'));
        $totalExpense = array_sum(array_column($this->expenses, 'amount'));
        return $totalIncome - $totalExpense;
    }
}

function main() {
    $manager = new BudgetManager();

    while (true) {
        echo "\nOptions:\n";
        echo "1. Add income\n";
        echo "2. Add expense\n";
        echo "3. View incomes\n";
        echo "4. View expenses\n";
        echo "5. View savings\n";
        echo "6. View categories\n";
        echo "7. Exit\n";
        
        $option = readline("Enter your option: ");

        switch ($option) {
            case '1':
                $amount = (float)readline("Enter income amount: ");
                $category = readline("Enter income category: ");
                $manager->addIncome($amount, $category);
                echo "Income added successfully.\n";
                break;
            case '2':
                $amount = (float)readline("Enter expense amount: ");
                $category = readline("Enter expense category: ");
                $manager->addExpense($amount, $category);
                echo "Expense added successfully.\n";
                break;
            case '3':
                $incomes = $manager->viewIncomes();
                echo "Incomes:\n";
                foreach ($incomes as $income) {
                    echo "Amount: {$income['amount']}, Category: {$income['category']}\n";
                }
                break;
            case '4':
                $expenses = $manager->viewExpenses();
                echo "Expenses:\n";
                foreach ($expenses as $expense) {
                    echo "Amount: {$expense['amount']}, Category: {$expense['category']}\n";
                }
                break;
            case '5':
                $savings = $manager->viewSavings();
                echo "Savings: $savings\n";
                break;
            case '6':
                $categories = $manager->viewCategories();
                echo "Categories:\n";
                foreach ($categories as $category) {
                    echo "$category\n";
                }
                break;
            case '7':
                echo "Exiting...\n";
                exit;
            default:
                echo "Invalid option. Please try again.\n";
                break;
        }
    }
}

main();
