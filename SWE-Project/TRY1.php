<!DOCTYPE html>
<html>
<head>
    <title>Floyd's Triangle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background: #f5f5f5;
        }
        form {
            margin-bottom: 20px;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        input[type=number] {
            width: 100%;
            padding: 8px;
            margin-top: 10px;
            box-sizing: border-box;
        }
        input[type=submit] {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 15px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type=submit]:hover {
            background-color: #0056b3;
        }
        .triangle {
            font-family: monospace;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<h2>Floyd's Triangle Generator</h2>

<form method="post">
    <label for="lines">Enter number of lines (n):</label><br>
    <input type="number" name="lines" id="lines" min="1" required><br>
    <input type="submit" value="Generate">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = intval($_POST['lines']);
    $num = 1;

    echo "<div class='triangle'>";
    for ($i = 1; $i <= $n; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo $num . " ";
            $num++;
        }
        echo "<br>";
    }
    echo "</div>";
}
?>

</body>
</html>