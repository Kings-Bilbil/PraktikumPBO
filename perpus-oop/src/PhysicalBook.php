<?php
namespace Library;

// Materi: 4. Inheritance (extends, override, parent::)
class EBook extends Book {
    private int $fileSize;

    public function __construct(string $title, string $author, float $price, int $fileSize) {
        parent::__construct($title, $author, $price); // Panggil parent
        $this->fileSize = $fileSize;
    }

    // Override __toString dari parent
    public function __toString(): string {
        return parent::__toString() . " (EBook: {$this->fileSize} MB)";
    }

    public function download(): void {
        echo "Downloading {$this->title}...\n";
    }
}
