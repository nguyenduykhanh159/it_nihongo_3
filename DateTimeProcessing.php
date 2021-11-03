<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>3-1</title>
</head>
<body>
    <h1>Date Time Processing</h1>
    <p>Enter your name and select date and time for the appointment</p>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
        <table>
            <tr>
                <td>Your name: </td>
                <td><input type="text" name="name" size="15"></td>
            </tr>
            <tr>
                <td>Date: </td>
                <td>
                    <select name="day">
                        <?php
                        for ($i = 1; $i <= 31; $i++) {
                            print ("<option>$i</option>");
                        }
                        ?>
                    </select>
                    <select name="month">
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            print ("<option>$i</option>");
                        }
                        ?>
                    </select>
                    <select name="year">
                        <?php
                        for ($i = 2000; $i <= 2021; $i++) {
                            print ("<option>$i</option>");
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Time: </td>
                <td>
                    <select name="hour">
                        <?php
                        for ($i = 0; $i <= 23; $i++) {
                            print ("<option>$i</option>");
                        }
                        ?>
                    </select>
                    <select name="minute">
                        <?php
                        for ($i = 0; $i <= 59; $i++) {
                            print ("<option>$i</option>");
                        }
                        ?>
                    </select>
                    <select name="second">
                        <?php
                        for ($i = 0; $i <= 59; $i++) {
                            print ("<option>$i</option>");
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Submit">
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>

<!--        Print result-->
        <?php
        $name = $_GET["name"];
        $day = $_GET["day"];
        $month = $_GET["month"];
        $year = $_GET["year"];
        $hour = $_GET["hour"];
        $minute = $_GET["minute"];
        $second = $_GET["second"];
        $months = array(1, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
        $days = array(31, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

        if (checkdate($month, $day, $year) == false) {
            echo "Invalid date!";
        } else {
            echo "Hello $name!<br>";
            if ($minute < 10) {
                $minute = "0" . $minute;
            }
            if ($second < 10) {
                $second = "0" . $second;
            }
            echo "You have choose to have an appointment on $hour:$minute:$second, $day/$month/$year<br>";
            echo "<br>More information<br>";

            if ($hour > 12) {
                $hour = $hour - 12;
                echo "<br>In 12 hours, the time and date is $hour:$minute:$second, $day/$month/$year<br>";
            } else {
                echo "<br>In 12 hours, the time and date is $hour:$minute:$second, $day/$month/$year<br>";
            }
            if ($month != 2) {
                for ($i = 0; $i < count($months); $i++) {
                    if ($month == $months[$i]) {
                        echo "<br>This month has $days[$i] days!";
                    }
                }
            } else {
                if ($year % 4 == 0) {
                    if ($year % 100 == 0) {
                        if ($year % 400 == 0) {
                            echo "<br>This month has 29 days!";
                        } else {
                            echo "<br>This month has 28 days!";
                        }
                    } else {
                        echo "<br>This month has 29 days!";
                    }
                } else {
                    echo "<br>This month has 28 days!";
                }
            }
        }
        ?>
    </form>
</body>
</html>