<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{HomeController, AboutController, AuthController, TransactionController, ReceiptController};
use App\Middlewares\AuthRequiredMiddleware;
use App\Middlewares\GuestOnlyMiddleware;

function registerRoutes(App $app)
{
  $app->get("/phpiggy/public/", [HomeController::class, 'home'])->add(AuthRequiredMiddleware::class);
  $app->get("/phpiggy/public/about", [AboutController::class, 'about']);
  $app->get("/phpiggy/public/register", [AuthController::class, 'registerView'])->add(GuestOnlyMiddleware::class);
  $app->post("/phpiggy/public/register", [AuthController::class, 'register'])->add(GuestOnlyMiddleware::class);
  $app->get("/phpiggy/public/login", [AuthController::class, 'loginView'])->add(GuestOnlyMiddleware::class);
  $app->post('/phpiggy/public/login', [AuthController::class, 'login'])->add(GuestOnlyMiddleware::class);
  $app->get('/phpiggy/public/logout', [AuthController::class, 'logout'])->add(AuthRequiredMiddleware::class);
  $app->get('phpiggy/public/transaction', [TransactionController::class, 'createView'])->add(AuthRequiredMiddleware::class);
  $app->post('phpiggy/public/transaction', [TransactionController::class, 'create'])->add(AuthRequiredMiddleware::class);
  $app->get('phpiggy/public/transaction/{transaction}', [TransactionController::class, 'editView'])->add(AuthRequiredMiddleware::class);
  $app->post('phpiggy/public/transaction/{transaction}', [TransactionController::class, 'edit'])->add(AuthRequiredMiddleware::class);
  $app->delete('phpiggy/public/transaction/{transaction}', [TransactionController::class, 'delete'])->add(AuthRequiredMiddleware::class);
  $app->get('phpiggy/public/transaction/{transaction}/receipts', [ReceiptController::class, 'uploadView'])->add(AuthRequiredMiddleware::class);
  $app->post('phpiggy/public/transaction/{transaction}/receipts', [ReceiptController::class, 'upload'])->add(AuthRequiredMiddleware::class);
  $app->get('phpiggy/public/transaction/{transaction}/receipt/{receipt}', [ReceiptController::class, 'download'])->add(AuthRequiredMiddleware::class);
  $app->delete('phpiggy/public/transaction/{transaction}/receipt/{receipt}', [ReceiptController::class, 'delete'])->add(AuthRequiredMiddleware::class);
}
