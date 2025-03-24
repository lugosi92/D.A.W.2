<?php
$str = "Hola Mundo! Bienvenido a PHP.";

// 1. addslashes()
echo "addslashes: " . addslashes($str) . "\n";

// 2. quotemeta()
echo "quotemeta: " . quotemeta($str) . "\n";

// 3. trim()
echo "trim: " . trim("  Hola PHP  ") . "\n";

// 4. chop()
echo "chop: " . chop("Hola PHP   ") . "\n";

// 5. chr()
echo "chr(65): " . chr(65) . "\n"; // 'A'

// 6. strchr()
echo "strchr: " . strchr($str, "M") . "\n";

// 7. str_pad()
echo "str_pad: '" . str_pad("PHP", 10, "-") . "'\n";

// 8. strrchr()
echo "strrchr: " . strrchr($str, "o") . "\n";

// 9. ucwords()
echo "ucwords: " . ucwords("hola php mundo") . "\n";

// 10. substr()
echo "substr: " . substr($str, 5, 10) . "\n";

// 11. strstr()
echo "strstr: " . strstr($str, "Mundo") . "\n";

// 12. stristr()
echo "stristr: " . stristr($str, "mundo") . "\n";

// 13. str_repeat()
echo "str_repeat: " . str_repeat("PHP ", 3) . "\n";

// 14. strrev()
echo "strrev: " . strrev($str) . "\n";

// 15. strtr()
echo "strtr: " . strtr("abcde", "a", "1") . "\n";

// 16. sprintf()
echo "sprintf: " . sprintf("Número: %d, Texto: %s", 42, "Hola") . "\n";
?>
