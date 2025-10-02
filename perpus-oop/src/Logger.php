<?php
namespace Library;

// Materi: 19. Dependency Injection (contoh dependency sederhana)
class Logger {
    public function log(string $message): void {
        echo "<p style='color: blue;'>[LOG] $message</p>\n"; // HTML untuk web
    }
}
