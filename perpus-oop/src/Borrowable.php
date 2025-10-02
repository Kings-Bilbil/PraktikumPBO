<?php
namespace Library;

// Materi: 10. Trait (reusable code)
trait Borrowable {
    private bool $isBorrowed = false;

    public function borrow(): bool {
        if (!$this->isBorrowed) {
            $this->isBorrowed = true;
            return true;
        }
        return false;
    }

    public function returnItem(): void {
        $this->isBorrowed = false;
    }

    public function isBorrowed(): bool { // Getter tambahan
        return $this->isBorrowed;
    }
}

// Gunakan trait di Book (tapi sudah di Book.php, ini contoh)
