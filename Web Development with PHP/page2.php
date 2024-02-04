<?php

session_start();
print_r($_SESSION);

echo "<br>";

?>


<!DOCTYPE html>
<html>
    <body>
    <a href="index.php" target="_blank" onclick="closeCurrentPage()";>Sayfa 1</a>

    <script>
        function closeCurrentPage() {
            window.close();
    }
    </script>
    </body>
</html>