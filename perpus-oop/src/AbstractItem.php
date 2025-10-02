<?php
namespace Library;

// Materi: 11. Polymorphism (abstract class)
use Library\ItemInterface;

abstract class AbstractItem implements ItemInterface {
    abstract public function getType(): string;

    public function display(): string {
        return "Type: " . $this->getType();
    }
}

// Contoh turunan sederhana (bisa extend Book jika perlu)
class Magazine extends AbstractItem {
    public function getType(): string {
        return "Magazine";
    }
}
