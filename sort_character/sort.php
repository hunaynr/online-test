<!DOCTYPE html>
<html>

<head>
    <title>Sort Character</title>
</head>

<body>
    <h2>Sort Character</h2>
    <form method="get" action="sort.php">
        Input one line of words (S): <input type="text" name="text">
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if (isset($_GET['submit'])) {
        $text = $_GET['text'];

        $vowels = '';
        foreach (array_count_values(str_split(preg_replace('/[bcdfghjklmnpqrstvwxyz ]/', '', strtolower($text)))) as $x => $y) {
            $vowels .= str_repeat($x, $y);
        }

        $consonants = '';
        foreach (array_count_values(str_split(preg_replace('/[aiueo ]/', '', strtolower($text)))) as $x => $y) {
            $consonants .= str_repeat($x, $y);
        }

        echo "<br><br>";
        echo "<h3>Line of Words (S):</h3>";
        echo $text;
        echo "<br>";
        echo "<h3>Vowel Characters:</h3>";
        echo $vowels;
        echo "<br>";
        echo "<h3>Consonant Characters:</h3>";
        echo $consonants;
    }
    ?>
</body>

</html>