<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\Templateengine;
use App\Services\TransactionService;

class HomeController
{


  public function __construct(private Templateengine $view, private TransactionService $transactionService)
  {
  }
  public function Home()
  {
    $transactions = $this->transactionService->getUserTransactions();
    echo $this->view->render("/index.php", [
      'transactions' => $transactions
    ]);
  }
}
