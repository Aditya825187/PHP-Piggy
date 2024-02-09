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
    $page = $_GET['p'] ?? 1;
    $page = (int) $page;
    $length = 3;
    $offset = ($page - 1) * $length;
    $searchTerm = $_GET['s'] ?? '';
    $transactions = $this->transactionService->getUserTransactions($length, $offset);
    $totalPage = count($transactions) / 3;
    echo $this->view->render("/index.php", [
      'transactions' => $transactions,
      'currentPage' => $page,
      'pagesLimit' => $totalPage,
      'previousPageQuery' => http_build_query([
        'p' => $page - 1,
        's' => $searchTerm
      ]),
      'nextPageQuery' => http_build_query([
        'p' => $page + 1,
        's' => $searchTerm
      ])
    ]);
  }
}
