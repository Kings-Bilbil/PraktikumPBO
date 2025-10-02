<?php
namespace Library;

// Materi: 1. Scope (public/private/protected), 2. Encapsulation (getter/setter), 3. Magic Methods (__construct, __destruct, __get, __set, __toString, __call), 5. Class Constants, 20. Cloning (__clone)
class Book {
    public $title;              // Public: akses langsung
    private $isbn;              // Private: hanya dalam kelas
    protected $author;          // Protected: kelas + turunan
    private float $price;
    private int $stock = 0;
    private int $loanCount = 0;
    const MAX_STOCK = 100;      // Constant

    public function __construct(string $title, string $author, float $price) {
        $this->title = $title;      // Encapsulation: set via construct
        $this->author = $author;
        $this->price = $price;
        $this->isbn = 'ISBN-' . rand(1000, 9999); // Auto-generate
        echo "Book {$this->title} dibuat.\n";   // __construct
    }

    public function __destruct() {
        echo "Book {$this->title} dihancurkan.\n"; // __destruct
    }

    // Encapsulation: Getter/Setter
    public function getIsbn(): string {
        return $this->isbn;
    }

    public function getAuthor(): string {
        return $this->author;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function setPrice(float $price): void {
        if ($price > 0) {
            $this->price = $price;
        }
    }

    public function getStock(): int {
        return $this->stock;
    }

    public function updateStock(int $quantity): void {
        $this->stock = min($this->stock + $quantity, self::MAX_STOCK); // Gunakan constant
    }

    public function getLoanCount(): int {
        return $this->loanCount;
    }

    public function incrementLoan(): void {
        $this->loanCount++;
    }

    // Magic: __get dan __set (untuk properti dinamis)
    public function __get(string $name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }

    public function __set(string $name, $value) {
        if (property_exists($this, $name) && in_array($name, ['title', 'price'])) {
            $this->$name = $value;
        }
    }

    // Magic: __toString
    public function __toString(): string {
        return "Book: {$this->title} by {$this->author} - Rp {$this->price}";
    }

    // Magic: __call (untuk method dinamis)
    public function __call(string $name, array $arguments) {
        if ($name === 'displayInfo') {
            echo $this->__toString() . "\n";
        } else {
            throw new \BadMethodCallException("Method $name tidak ada");
        }
    }

    // Cloning: __clone
    public function __clone() {
        $this->loanCount = 0; // Reset state
        echo "Book cloned, loan count reset to 0.\n";
    }

    // Check stock limit (gunakan constant)
    public function checkStockLimit(): bool {
        return $this->stock < self::MAX_STOCK;
    }
}
