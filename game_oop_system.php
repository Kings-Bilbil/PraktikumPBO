<?php

// Mengatur error reporting untuk menampilkan semua kesalahan
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<!DOCTYPE html>
<html lang='id'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Demonstrasi 20 Konsep OOP PHP</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; margin: 20px; background-color: #f4f4f4; color: #333; }
        .container { max-width: 900px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1, h2 { color: #0056b3; border-bottom: 2px solid #0056b3; padding-bottom: 10px; }
        pre { background: #eee; padding: 15px; border-radius: 5px; white-space: pre-wrap; word-wrap: break-word; font-family: 'Courier New', Courier, monospace; }
        .output { border: 1px solid #ddd; padding: 10px; margin-top: 10px; border-radius: 5px; background-color: #fafafa; }
        .info { background-color: #e7f3fe; border-left: 6px solid #2196F3; padding: 10px; margin: 15px 0; }
    </style>
</head>
<body><div class='container'>";

echo "<h1>Demonstrasi 20 Konsep OOP PHP</h1>";

// =================================================================================
// 13. NAMESPACES & AUTOLOADING (disimulasikan)
// =================================================================================
// Namespace membantu mengorganisir kode dan menghindari konflik nama class.
// Autoloading adalah mekanisme untuk memuat class secara otomatis saat dibutuhkan.
// Di sini kita mensimulasikannya karena semua class ada di satu file.
echo "<h2>13. Namespaces & Autoloading</h2>";
echo "<div class='info'>Namespace digunakan untuk mengelompokkan class terkait dan mencegah konflik penamaan. <code>spl_autoload_register</code> adalah cara PHP untuk memuat file class secara otomatis. Karena semua kode ada di satu file, kita hanya akan mendefinisikan namespace dan menggunakannya.</div>";

namespace Game\Characters {

    use Game\Equipment\Weapon;
    use Game\Interfaces\Playable;
    use Game\Traits\Logger;
    use \Exception;
    use \IteratorAggregate;
    use \ArrayIterator;
    
    // =================================================================================
    // 5. CLASS CONSTANTS
    // =================================================================================
    // Konstanta yang nilainya tetap dan terikat pada class.
    // Diakses menggunakan NamaClass::NAMA_KONSTANTA.
    const DEFAULT_RACE = 'Human';

    // =================================================================================
    // 11. POLYMORPHISM (via Interface)
    // =================================================================================
    // Interface mendefinisikan "kontrak" atau standar method yang harus dimiliki oleh sebuah class.
    // Class yang mengimplementasikan interface ini *wajib* memiliki method yang didefinisikan.
    
    // Ini juga bagian dari Polimorfisme: objek dari class yang berbeda (yang mengimplementasi Playable)
    // dapat merespon panggilan method `move()` dengan cara yang berbeda.
}

namespace Game\Interfaces {
    interface Playable
    {
        public function move(int $x, int $y): string;
    }
}


namespace Game\Traits {
    // =================================================================================
    // 10. TRAIT
    // =================================================================================
    // Trait adalah mekanisme untuk menggunakan ulang kode (method) di beberapa class yang tidak saling terkait.
    // Ini mengatasi batasan PHP yang hanya mendukung single inheritance.
    trait Logger
    {
        public function log(string $message): void
        {
            echo "<div class='output'>[LOG]: " . htmlspecialchars($message) . "</div>";
        }
    }
}

namespace Game\Equipment {
    // =================================================================================
    // 11. POLYMORPHISM (via Abstract Class)
    // =================================================================================
    // Abstract class adalah class yang tidak bisa diinstansiasi (dibuat objeknya).
    // Berfungsi sebagai kerangka dasar untuk class turunannya.
    // Method yang abstract *harus* di-override oleh class turunan.
    abstract class Weapon
    {
        protected string $name;

        public function __construct(string $name)
        {
            $this->name = $name;
        }

        public function getName(): string
        {
            return $this->name;
        }

        abstract public function attack(): string;
    }

    class Sword extends Weapon
    {
        public function attack(): string
        {
            return "Swings the " . $this->name;
        }
    }

    class Staff extends Weapon
    {
        public function attack(): string
        {
            return "Casts a spell with the " . $this->name;
        }
    }
}


namespace Game\Characters {
    // =================================================================================
    // 1. SCOPE: public, protected, private
    // =================================================================================
    // public: Bisa diakses dari mana saja.
    // protected: Hanya bisa diakses dari dalam class itu sendiri dan class turunannya.
    // private: Hanya bisa diakses dari dalam class itu sendiri.
    
    // =================================================================================
    // 16. OBJECT ITERATION
    // =================================================================================
    // Menggunakan IteratorAggregate agar objek bisa di-looping dengan `foreach`.
    // Ini lebih sederhana daripada mengimplementasikan `Iterator` secara penuh.
    class Character implements \Game\Interfaces\Playable, \IteratorAggregate
    {
        use \Game\Traits\Logger;

        // 1. Scope & 12. Static Properties
        public string $name;
        protected int $health;
        private int $mana;
        protected Weapon $weapon;
        public static int $characterCount = 0;

        // 5. Class Constants
        const MAX_HEALTH = 100;

        // =================================================================================
        // 3. MAGIC METHODS: __construct()
        // 8. TYPE HINTING & RETURN TYPES
        // 18. DEPENDENCY INJECTION (DI)
        // =================================================================================
        // __construct(): Method yang otomatis dipanggil saat objek dibuat.
        // Type Hinting: Mendefinisikan tipe data untuk parameter (string, int, Weapon).
        // Dependency Injection: Objek `Weapon` "disuntikkan" ke dalam `Character` saat pembuatan,
        //                     ini membuat class lebih fleksibel.
        public function __construct(string $name, Weapon $weapon, int $health = self::MAX_HEALTH)
        {
            $this->name = $name;
            $this->weapon = $weapon;
            $this->health = $health;
            $this->mana = 50; // default mana
            self::$characterCount++;
            $this->log("Character '{$this->name}' created.");
        }

        // =================================================================================
        // 2. ENCAPSULATION
        // =================================================================================
        // Menyembunyikan data (properti protected/private) dan menyediakan method (public)
        // untuk mengakses atau memanipulasi data tersebut (getter & setter).
        public function getHealth(): int
        {
            return $this->health;
        }

        // 9. EXCEPTION HANDLING
        public function takeDamage(int $damage): void
        {
            if ($damage < 0) {
                // melempar exception jika input tidak valid
                throw new \InvalidArgumentException("Damage cannot be negative.");
            }
            $this->health -= $damage;
            $this->log("{$this->name} takes {$damage} damage. Health is now {$this->health}.");
        }

        // 8. Union Types (PHP 8+)
        public function setMana(int|float $manaValue): void
        {
             $this->mana = (int)$manaValue;
        }
        
        public function getMana(): int {
            return $this->mana;
        }
        
        // 11. Polymorphism (implementasi dari interface Playable)
        public function move(int $x, int $y): string
        {
            return "{$this->name} moves to coordinates ({$x}, {$y}).";
        }
        
        public function performAttack(): string
        {
            return "{$this->name} " . $this->weapon->attack();
        }

        // =================================================================================
        // 6. LATE STATIC BINDING (self:: vs static::)
        // =================================================================================
        // `self::` selalu merujuk ke class di mana ia ditulis (`Character`).
        // `static::` merujuk ke class yang dipanggil saat runtime (`Warrior`, `Mage`).
        public static function whoAmIWithSelf(): string
        {
            return "I am an instance of " . self::class;
        }

        public static function whoAmIWithStatic(): string
        {
            return "I am an instance of " . static::class . " using late static binding.";
        }

        // 12. Static Methods
        public static function getCharacterCount(): int
        {
            return self::$characterCount;
        }

        // 3. MAGIC METHODS: __get(), __set(), __call()
        public function __get(string $name)
        {
            return "Cannot access private property '{$name}'.";
        }

        public function __set(string $name, $value)
        {
            echo "<div class='output'>Cannot set private property '{$name}'.</div>";
        }

        public function __call(string $name, array $arguments)
        {
            return "Method '{$name}' does not exist. Arguments: " . implode(', ', $arguments);
        }

        // 3. MAGIC METHODS: __toString()
        public function __toString(): string
        {
            return "Character Name: {$this->name}, Health: {$this->health}, Weapon: {$this->weapon->getName()}";
        }

        // 15. OBJECT SERIALIZATION: __sleep() & __wakeup()
        public function __sleep(): array
        {
            $this->log("{$this->name} is going to sleep (serializing)...");
            return ['name', 'health', 'mana']; // Hanya properti ini yang akan di-serialize
        }

        public function __wakeup(): void
        {
            $this->log("{$this->name} woke up (unserializing)!");
            // Di sini bisa untuk menginisialisasi ulang koneksi database, dll.
            // Kita set ulang weapon karena tidak ikut di-serialize
            $this->weapon = new \Game\Equipment\Sword("Basic Sword"); 
        }

        // 3. MAGIC METHODS: __destruct()
        public function __destruct()
        {
            $this->log("Character '{$this->name}' is being destroyed.");
        }
        
        // 19. CLONING OBJECT: __clone()
        // Method ini akan dipanggil ketika objek di-clone.
        // Berguna untuk melakukan "deep copy" jika ada properti yang merupakan objek.
        public function __clone()
        {
            // Saat karakter di-clone, kita juga meng-clone objek weapon-nya
            // agar karakter asli dan kloningannya tidak berbagi objek weapon yang sama.
            $this->weapon = clone $this->weapon;
            self::$characterCount++;
            $this->log("Character '{$this->name}' has been cloned.");
        }

        // 16. OBJECT ITERATION (Implementasi dari IteratorAggregate)
        public function getIterator(): \ArrayIterator
        {
            return new \ArrayIterator([
                'name' => $this->name,
                'health' => $this->health,
                'weapon' => $this->weapon->getName()
            ]);
        }
    }

    // =================================================================================
    // 4. INHERITANCE
    // =================================================================================
    // `Warrior` adalah turunan dari `Character`. Ia mewarisi semua properti dan method
    // public dan protected, dan bisa menambahkan atau menimpa (override) fungsionalitas.
    class Warrior extends Character
    {
        protected int $rage = 0;

        // Override constructor
        public function __construct(string $name, Weapon $weapon)
        {
            // Memanggil constructor dari parent class
            parent::__construct($name, $weapon, 150); // Warrior punya health lebih tinggi
        }

        // Override method (Polymorphism)
        public function performAttack(): string
        {
            $this->rage += 10;
            // Memanggil method parent
            $parentAttack = parent::performAttack(); 
            return "{$parentAttack} with rage! (Rage: {$this->rage})";
        }
        
        // =================================================================================
        // 7. FINAL KEYWORD (untuk method)
        // =================================================================================
        // Method ini tidak bisa di-override oleh class turunan dari Warrior.
        final public function battleCry(): string
        {
            return "{$this->name} shouts: For glory!";
        }
    }

    class Mage extends Character
    {
        // Override method
        public function performAttack(): string
        {
            if ($this->getMana() >= 10) {
                $this->setMana($this->getMana() - 10);
                return parent::performAttack() . " Mana left: " . $this->getMana();
            }
            return "{$this->name} is out of mana!";
        }
    }

    // 7. FINAL KEYWORD (untuk class)
    // Class ini tidak bisa memiliki turunan (tidak bisa di-extends).
    final class Elf extends Character
    {
        public function specialAbility(): string
        {
            return "{$this->name} uses nature's sight.";
        }
    }
}

// =================================================================================
// 14. PENERAPAN MVC (Model-View-Controller) SEDERHANA & CRUD DENGAN OOP
// =================================================================================
// MODEL: Class Character, Warrior, Mage. Mereka merepresentasikan data.
// VIEW: Class yang bertanggung jawab untuk menampilkan data ke pengguna.
// CONTROLLER: Class yang menjadi perantara antara Model dan View.
namespace Game\System {
    
    use Game\Characters\Character;
    
    class CharacterView
    {
        public function showCharacterDetails(Character $character): void
        {
            echo "<div class='output'>";
            echo "<strong>Character Details:</strong><br>";
            echo "- Name: " . htmlspecialchars($character->name) . "<br>";
            echo "- Health: " . $character->getHealth() . "<br>";
            echo "</div>";
        }
        
        public function showAllCharacters(array $characters): void
        {
            echo "<div class='output'><strong>All Characters:</strong><br><ul>";
            if (empty($characters)) {
                echo "<li>No characters in the party.</li>";
            } else {
                foreach ($characters as $id => $char) {
                    echo "<li>ID {$id}: " . htmlspecialchars($char) . "</li>";
                }
            }
            echo "</ul></div>";
        }
    }
    
    class CharacterController
    {
        private array $characters = []; // Bertindak sebagai 'database' sederhana
        private CharacterView $view;
        
        public function __construct(CharacterView $view)
        {
            $this->view = $view;
        }
        
        // C - Create
        public function createCharacter(Character $character): string
        {
            $id = uniqid();
            $this->characters[$id] = $character;
            echo "<div class='output'>Character '{$character->name}' added with ID {$id}.</div>";
            return $id;
        }
        
        // R - Read
        public function showCharacters(): void
        {
            $this->view->showAllCharacters($this->characters);
        }

        // U - Update
        public function updateCharacterName(string $id, string $newName): void
        {
            if(isset($this->characters[$id])) {
                $this->characters[$id]->name = $newName;
                echo "<div class='output'>Character ID {$id} name updated to '{$newName}'.</div>";
            } else {
                 echo "<div class='output'>Character ID {$id} not found.</div>";
            }
        }
        
        // D - Delete
        public function deleteCharacter(string $id): void
        {
            if(isset($this->characters[$id])) {
                echo "<div class='output'>Character '{$this->characters[$id]->name}' (ID {$id}) removed.</div>";
                unset($this->characters[$id]);
            } else {
                echo "<div class='output'>Character ID {$id} not found.</div>";
            }
        }
    }
}


// =================================================================================
// =================================================================================
// == PENGGUNAAN DAN DEMONSTRASI SEMUA KONSEP ==
// =================================================================================
// =================================================================================
use Game\Characters\{Character, Warrior, Mage, Elf};
use Game\Equipment\{Sword, Staff, Weapon};
use Game\Interfaces\Playable;
use Game\System\{CharacterController, CharacterView};

// Inisialisasi
echo "<h1>Mulai Demonstrasi</h1>";

// Membuat objek-objek senjata (dependency)
$sword = new Sword("Excalibur");
$staff = new Staff("Staff of Wisdom");

// =================================================================================
// 1, 2, 3, 5, 8, 18. Scope, Encapsulation, Magic Methods, Constants, Type Hinting, DI
// =================================================================================
echo "<h2>1, 2, 3, 5, 8, 18. Konsep Dasar Class</h2>";
echo "<div class='info'>Membuat objek Warrior. Perhatikan log dari constructor dan destructor. Kita juga akan mengakses properti dengan scope berbeda dan menggunakan getter.</div>";
$warrior = new Warrior("Aragorn", $sword);
echo "<div class='output'>Nama: " . $warrior->name . "</div>"; // Public, bisa diakses
echo "<div class='output'>Health: " . $warrior->getHealth() . " (diakses via getter)</div>"; // Protected, diakses via getter
echo "<div class='output'>Mengakses 'mana' (private): " . $warrior->mana . "</div>"; // Mencoba akses private property (trigger __get)
$warrior->mana = 100; // Mencoba set private property (trigger __set)

// =================================================================================
// 4. Inheritance & 11. Polymorphism (Overriding)
// =================================================================================
echo "<h2>4 & 11. Inheritance & Polymorphism (Overriding)</h2>";
echo "<div class='info'>Warrior dan Mage adalah turunan dari Character. Keduanya meng-override method `performAttack()` dengan implementasi yang berbeda.</div>";
$mage = new Mage("Gandalf", $staff);
echo "<div class='output'>" . $warrior->performAttack() . "</div>";
echo "<div class='output'>" . $mage->performAttack() . "</div>";

// =================================================================================
// 6. Late Static Binding
// =================================================================================
echo "<h2>6. Late Static Binding (self:: vs static::)</h2>";
echo "<div class='info'><code>self::class</code> selalu merujuk ke class `Character`, sedangkan <code>static::class</code> merujuk ke class yang dipanggil (`Warrior`).</div>";
echo "<div class='output'>Panggilan dari Warrior (self): " . $warrior::whoAmIWithSelf() . "</div>";
echo "<div class='output'>Panggilan dari Warrior (static): " . $warrior::whoAmIWithStatic() . "</div>";

// =================================================================================
// 7. Final Keyword
// =================================================================================
echo "<h2>7. Final Keyword</h2>";
echo "<div class='info'>Class `Elf` adalah final dan tidak bisa di-extends. Method `battleCry()` di `Warrior` juga final dan tidak bisa di-override.</div>";
$elf = new Elf("Legolas", new Sword("Elven Blade"));
echo "<div class='output'>" . $elf->specialAbility() . "</div>";
echo "<div class='output'>" . $warrior->battleCry() . "</div>";

// =================================================================================
// 9. Exception Handling
// =================================================================================
echo "<h2>9. Exception Handling</h2>";
echo "<div class='info'>Mencoba memberikan damage dengan nilai negatif akan memicu `Exception` yang kemudian ditangkap oleh blok `catch`. Blok `finally` akan selalu dieksekusi.</div>";
try {
    echo "<div class='output'>Mencoba mengurangi health dengan nilai positif (50)...</div>";
    $warrior->takeDamage(50);
    echo "<div class='output'>Health Aragorn sekarang: " . $warrior->getHealth() . "</div>";
    echo "<div class='output'>Mencoba mengurangi health dengan nilai negatif (-20)...</div>";
    $warrior->takeDamage(-20);
} catch (\InvalidArgumentException $e) {
    echo "<div class='output'><strong>Exception Ditangkap:</strong> " . $e->getMessage() . "</div>";
} finally {
    echo "<div class='output'>Blok `finally` selalu dieksekusi.</div>";
}


// =================================================================================
// 10. Trait
// =================================================================================
echo "<h2>10. Trait</h2>";
echo "<div class='info'>Class `Character` menggunakan `Logger` trait, sehingga memiliki akses ke method `log()`. Output log telah muncul sepanjang demonstrasi ini.</div>";
$mage->log("Pesan ini datang dari method log() di dalam Trait.");


// =================================================================================
// 12. Static Properties & Methods
// =================================================================================
echo "<h2>12. Static Properties & Methods</h2>";
echo "<div class='info'><code>Character::\$characterCount</code> melacak jumlah total objek yang dibuat, diakses melalui method statis tanpa perlu instansiasi.</div>";
echo "<div class='output'>Jumlah karakter yang telah dibuat: " . Character::getCharacterCount() . "</div>";


// =================================================================================
// 14. Penerapan MVC & CRUD
// =================================================================================
echo "<h2>14. Penerapan MVC & CRUD</h2>";
$view = new CharacterView();
$controller = new CharacterController($view);

echo "<div class='info'><strong>CREATE:</strong> Menambahkan karakter ke controller.</div>";
$warriorId = $controller->createCharacter($warrior);
$mageId = $controller->createCharacter($mage);

echo "<div class='info'><strong>READ:</strong> Menampilkan semua karakter.</div>";
$controller->showCharacters();

echo "<div class='info'><strong>UPDATE:</strong> Mengubah nama karakter.</div>";
$controller->updateCharacterName($warriorId, "Aragorn King of Gondor");
$controller->showCharacters();

echo "<div class='info'><strong>DELETE:</strong> Menghapus karakter.</div>";
$controller->deleteCharacter($mageId);
$controller->showCharacters();


// =================================================================================
// 15. Object Serialization
// =================================================================================
echo "<h2>15. Object Serialization</h2>";
echo "<div class='info'>Mengubah objek menjadi string (serialize) untuk disimpan, lalu mengubahnya kembali menjadi objek (unserialize). Method `__sleep` dan `__wakeup` dipanggil selama proses ini.</div>";
$serializedWarrior = serialize($warrior);
echo "<pre>Objek Warrior setelah di-serialize:\n" . htmlspecialchars($serializedWarrior) . "</pre>";
unset($warrior); // Hancurkan objek asli
$unserializedWarrior = unserialize($serializedWarrior);
echo "<div class='output'>Objek setelah di-unserialize: " . $unserializedWarrior . "</div>";


// =================================================================================
// 16. Object Iteration
// =================================================================================
echo "<h2>16. Object Iteration</h2>";
echo "<div class='info'>Karena class `Character` mengimplementasikan `IteratorAggregate`, kita bisa melakukan looping `foreach` langsung pada objeknya.</div>";
echo "<div class='output'>Melakukan iterasi pada properti objek Mage:<ul>";
foreach ($mage as $property => $value) {
    echo "<li>" . htmlspecialchars($property) . ": " . htmlspecialchars($value) . "</li>";
}
echo "</ul></div>";


// =================================================================================
// 17. Reflection
// =================================================================================
echo "<h2>17. Reflection</h2>";
echo "<div class='info'>Reflection API digunakan untuk 'melihat' struktur internal sebuah class secara dinamis saat program berjalan.</div>";
$reflection = new \ReflectionClass(Warrior::class);
echo "<pre>Analisis Class '{$reflection->getName()}':\n";
echo "- Parent Class: " . $reflection->getParentClass()->getName() . "\n";
echo "- Methods: " . implode(', ', array_map(fn($m) => $m->name, $reflection->getMethods(\ReflectionMethod::IS_PUBLIC))) . "\n";
echo "- Properties: " . implode(', ', array_map(fn($p) => $p->name, $reflection->getProperties())) . "\n";
echo "</pre>";


// =================================================================================
// 19. Cloning Object
// =================================================================================
echo "<h2>19. Cloning Object</h2>";
echo "<div class='info'>Menduplikasi objek. Method `__clone` memastikan bahwa objek `Weapon` juga ikut terduplikasi (deep copy), sehingga tidak ada referensi bersama antara objek asli dan kloningannya.</div>";
$clonedMage = clone $mage;
$clonedMage->name = "Gandalf the White"; // Mengubah nama kloningan
echo "<div class='output'>Objek Asli: " . $mage . "</div>";
echo "<div class='output'>Objek Kloningan: " . $clonedMage . "</div>";
echo "<div class='output'>Jumlah karakter saat ini (setelah clone): " . Character::getCharacterCount() . "</div>";


// =================================================================================
// 20. Anonymous Class
// =================================================================================
echo "<h2>20. Anonymous Class</h2>";
echo "<div class='info'>Membuat class sekali pakai tanpa nama. Berguna untuk implementasi sederhana dari sebuah interface.</div>";
$specialQuestGiver = new class("Mysterious Old Man", new Staff("Wooden Stick")) extends Character {
    public function giveQuest(): string
    {
        return "{$this->name} offers a special quest!";
    }
};
echo "<div class='output'>" . $specialQuestGiver->giveQuest() . "</div>";
echo "<div class='output'>" . $specialQuestGiver->move(10, 20) . "</div>";


echo "</div></body></html>";
?>
