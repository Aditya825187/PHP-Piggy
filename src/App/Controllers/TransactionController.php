<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\Templateengine;
use App\Services\{ValidatorService, TransactionService};


class TransactionController
{
  public function __construct(private Templateengine $view, private ValidatorService $validatorService, private TransactionService $transactionService)
  {
  }

  public function createView()
  {
    echo $this->view->render('transactions/create.php');
  }

  public function create()
  {

    $this->validatorService->validateTransaction($_POST);
    $this->transactionService->create($_POST);

    redirectTo('/phpiggy/public/');
  }

  public function editView(array $params)
  {
    $transaction = $this->transactionService->getUserTransaction($params['transaction']);

    if (!$transaction) {
      redirectTo('/phpiggy/public/');
    }
    echo $this->view->render(
      'transactions/edit.php',
      [
        'transaction' => $transaction
      ]
    );
  }

  public function edit(array $params)
  {
    $transaction = $this->transactionService->getUserTransaction(
      $params['transaction']
    );

    if (!$transaction) {
      redirectTo('/phpiggy/public/');
    }

    $this->validatorService->validateTransaction($_POST);

    $this->transactionService->update($_POST, $transaction['id']);

    redirectTo($_SERVER['HTTP_REFERER']);
  }

  public function delete(array $params)
  {

    $this->transactionService->delete($params['transaction']);

    redirectTo('/phpiggy/public/');
  }
}
