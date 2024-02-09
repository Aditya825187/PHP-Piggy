<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\Templateengine;
use App\Services\{TransactionService, ReceiptService};

class ReceiptController
{
  public function __construct(
    private Templateengine $view,
    private TransactionService $transactionService,
    private ReceiptService $receiptService
  ) {
  }

  public function uploadView(array $params)
  {
    $transaction = $this->transactionService->getUserTransaction($params['transaction']);

    if (!$transaction) {
      redirectTo('/phpiggy/public/');
    }

    echo $this->view->render("receipts/create.php");
  }

  public function upload(array $params)
  {
    $transaction = $this->transactionService->getUserTransaction($params['transaction']);

    if (!$transaction) {
      redirectTo('/phpiggy/public/');
    }

    $receiptFile = $_FILES['receipt'] ?? null;

    $this->receiptService->validateFile($receiptFile);
    $this->receiptService->upload($receiptFile, $transaction['id']);
    redirectTo('/phpiggy/public/');
  }

  public function download(array $params)
  {
    $transaction = $this->transactionService->getUserTransaction(
      $params['transaction']
    );

    if (!$transaction) {
      redirectTo('/phpiggy/public/');
    }

    $receipt = $this->receiptService->getreceipt($params['receipt']);

    if (!$receipt) {
      redirectTo('/phpiggy/public/');
    }

    if ($receipt['transaction_id'] !== $transaction['id']) {
      redirectTo('/phpiggy/public/');
    }

    $this->receiptService->read($receipt);
  }

  public function delete(array $params)
  {
    $transaction = $this->transactionService->getUserTransaction(
      $params['transaction']
    );

    if (!$transaction) {
      redirectTo('/phpiggy/public/');
    }

    $receipt = $this->receiptService->getreceipt($params['receipt']);

    if (!$receipt) {
      redirectTo('/phpiggy/public/');
    }

    if ($receipt['transaction_id'] !== $transaction['id']) {
      redirectTo('/phpiggy/public/');
    }

    $this->receiptService->delete($receipt);

    redirectTo('/phpiggy/public/');
  }
}
