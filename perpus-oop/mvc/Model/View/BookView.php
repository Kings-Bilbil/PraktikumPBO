<?php
namespace Library\View;

// Materi: 15. MVC (View)
class BookView {
    public function displayBooks(array $books): void {
        echo "<h2>Daftar Buku di Perpustakaan:</h2><ul>";
        foreach ($books as $book) {
            echo "<li>" . htmlspecialchars((string)$book) . " - Harga: Rp " . $book->getPrice() . "</li>";
        }
        echo "</ul>";
    }
}
