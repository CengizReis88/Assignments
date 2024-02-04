<?php

$file = fopen("test.txt", "r");
echo fread($file,filesize("test.txt"));
echo "<br>";


$additionalContent = "MORE CONTENT";

file_put_contents("test.txt",$additionalContent,FILE_APPEND);

?>

<html>
    <body>
        <a href="filehandling.php" target="_blank" onclick="closeCurrentPage()";>Update the content</a>
        <a href="index.php" target="_blank" onclick="closeCurrentPage()";>Sayfa 1</a>
            <script>
                function closeCurrentPage() {
                    window.close();
            }
            </script>
    </body>
</html>