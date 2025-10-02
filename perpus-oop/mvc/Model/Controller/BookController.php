<?php
namespace Library\Controller;

// Materi: 15. MVC (Controller), 19. Dependency Injection (constructor injection)
use Library\Model\BookModel;
use Library\View\BookView;
use Library\Book;
use Library\Logger;
use Exception;

class BookController {
    private BookModel $model;
    private BookView $view;
    private Logger $logger;

    public function __construct(BookModel $model, BookView $view, Logger $logger) { // DI
        $this->model = $model;
        $this->view = $view;
        $this->logger = $logger;
    }

    // Create
    public function addBook(string $title, string $author, float $price): void {
        try {
            $book = new Book($title, $author, $price);
            $this->model->create($book);
            $this->logger->log("Buku '$title' ditambahkan");
        } catch (Exception $e) {
            $this->logger->log("Error: " . $e->getMessage());
        }
    }

    // Read
    public function index(): void {
        $books = $this->model->readAll();
        $this->view->displayBooks($books);
    }

    // Update & Delete (contoh sederhana)
    public function updateBook(int $index, string $newTitle): void {
        if ($this->model->update($index,