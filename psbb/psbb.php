<!DOCTYPE html>
<html>

<head>
    <title>PSBB</title>
</head>

<body>
    <h2>PSBB</h2>
    <form method="get" action="psbb.php">
        Input the number of families: <input type="text" name="family">
        <br><br>
        Input the number of members in the family: <input type="text" name="member">
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if (isset($_GET['submit'])) {
        $family = $_GET['family'];
        $member = $_GET['member'];
        $member = array_map('intval', str_split(str_replace(' ', '', $member)));

        try {
            if (count($member) != $family) {
                throw new Exception("Input must be equal to count of family");
            }
        } catch (Exception $e) {
            $message = $e->getMessage();

            echo "<br><br>";
            echo "<h3 style='color:red'>";
            die($message);
            echo "</h3>";
        }

        $bus = 0;
        $arr = array();
        foreach ($member as $k => $v) {
            if ($v >= 4) {
                if ($v % 4 == 0) {
                    $bus += $v / 4;
                } else {
                    $bus += floor($v / 4);
                    array_push($arr, $v % 4);
                }
            } else {
                array_push($arr, $v);
            }
        }
        $bus += ceil(array_sum($arr) / 4);

        echo "<br><br>";
        echo "<h3>Number of Families:</h3>";
        echo $family . "<br>";

        echo "<h3>Number of Members in the Family:</h3>";
        echo $_GET['member'] . "<br>";

        echo "<h3>Minimum Bus Required:</h3>";
        echo $bus . "<br>";
    }
    ?>
</body>

</html>