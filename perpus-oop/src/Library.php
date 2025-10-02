<?php
namespace Library;

// Materi: 6. Late Static Binding (di LibraryItem), 9. Exception Handling, 12. Static Properties/Methods, 17. Object Iteration (IteratorAggregate), 16. Object Serialization (__sleep, __wakeup), 21. Anonymous Class, 14. CRUD (integrasi dengan MVC)
use Traversable;

class Library implements \IteratorAggregate {
    private array $books = [];
    private static int $totalBooks = 0; // Static property

    // Static method
    public static function getTotalBooks(): int {
        return self::$totalBooks;
    }

    public static function incrementTotal(): void {
        self::$totalBooks++;
    }

    // CRUD: Create
    public function createBook(string $title, string $author, float $price): Book {
        self::incrementTotal();
        $book = new Book($title, $author, $price);
        $this->books[] = $book;
        return $book;
    }

    // Read
    public function readBook(int $index): ?Book {
        return $this->books[$index] ?? null;
    }

    public function readAllBooks(): array {
        return $this->books;
    }

    // Update
    public function updateBook(int $index, string $newTitle): bool {
        if (isset($this->books[$index])) {
            $this->books[$index]->title = $newTitle; // Via __set
            return true;
        }
        return false;
    }

    // Delete
    public function deleteBook(int $index): bool {
        if (isset($this->books[$index])) {
            unset($this->books[$index]);
            return true;
        }
        return false;
    }

    // Exception Handling
    public function addBook(Book $book): void {
        try {
            if (count($this->books) >= 50) { // Simulasi limit
                throw new \Exception("Library penuh! Maksimal 50 buku.");
            }
            if ($book->getPrice() < 0) {
                throw new \InvalidArgumentException("Harga buku tidak boleh negatif.");
            }
            $this->books[] = $book;
            self::incrementTotal();
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
        } finally {
            echo "Proses addBook selesai.\n";
        }
    }

    // Iteration: IteratorAggregate
    public function getIterator(): Traversable {
        return new \ArrayIterator($this->books);
    }

    // Serialization: __sleep dan __wakeup (untuk simpan/load state)
    public function __sleep(): array {
        return ['books']; // Properti yang disimpan
    }

    public function __wakeup(): void {
        self::$totalBooks = count($this->books); // Restore static
        echo "Library di-wakeup dari serial.\n";
    }

    // Anonymous Class integration (Notifier)
    private ?\Library\NotifierInterface $notifier = null;

    public function setCustomNotifier(\Library\NotifierInterface $notifier): void {
        $this->notifier = $notifier;
    }

    public function notifyIfSet(string $message): void {
        if ($this->notifier) {
            $this->notifier->notify($message);
        }
    }
}

// Interface untuk Anonymous Class (poin 21)
interface NotifierInterface {
    public function notify(string $message): void;
}
