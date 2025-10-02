<?php
namespace Library;

// Materi: 8. Type Hinting & Return Types (union types)
class Member {
    private string $name;
    private int|string $id; // Union type (PHP 8+)

    public function __construct(string $name, int|string $id) { // Type hint parameter
        $this->name = $name;
        $this->id = $id;
    }

    public function getId(): int|string { // Return type
        return $this->id;
    }

    public function setId(int|string $id): void { // Type hint + return void
        $this->id = $id;
    }

    public function getName(): string {
        return $this->name;
    }
}
