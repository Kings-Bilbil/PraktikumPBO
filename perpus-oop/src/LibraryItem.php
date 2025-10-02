<?php
namespace Library;

// Materi: 6. Late Static Binding (self:: vs static::)
abstract class LibraryItem {
    protected static int $itemCount = 0;

    public static function getItemCount(): int {
        return static::$itemCount; // Late binding: ke turunan
    }

    protected function incrementCount(): void {
        static::$itemCount++; // Late binding
    }
}
