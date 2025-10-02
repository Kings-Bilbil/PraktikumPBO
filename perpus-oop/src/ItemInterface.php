<?php
namespace Library;

// Materi: 11. Polymorphism (interface)
interface ItemInterface {
    public function display(): string;
    public function getType(): string;
}
