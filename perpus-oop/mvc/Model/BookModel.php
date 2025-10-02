<?php
namespace Library\Model;

// Materi: 14. CRUD dengan OOP, 9. Exception, 15. MVC (Model)
use Library\Book;
use Exception;

class BookModel {
    private array $books = [];

    // Create
    public function create(Book $book): void {
        // Validasi (exception)
        if ($book->getPrice() < 0) {
            throw new Exception("Harga buku tidak boleh negatif!");
        }
        $this->books[] = $book;
    }

    // Read
    public function readAll(): array {
        return $this->books;
    }

    public function readByIndex(int $index): ?Book {
        return $this->books[$index] ?? null;
    }

    // Update
    public function update(int $index, string $newTitle): bool {
        if (isset($this->books[$index])) {
            $this->books[$index]->title = $newTitle;
            return true;
        }
        return false;
    }

    // Delete
    public function delete(int $index): bool {
        if (isset($this->books[$index])) {
            unset($this->books[$index]);
            return true;
        }
        return false;
    }
}
