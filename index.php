<!DOCTYPE html>
<html>
<head>
    <title>随机密码生成器</title>
</head>
<body>
    <h1>随机密码生成器</h1>
    <form method="post">
        <label for="num-passwords">要生成的密码数量：</label>
        <input type="number" id="num-passwords" name="num-passwords" value="10"><br><br>
        <label for="password-length">每个密码的长度：</label>
        <input type="number" id="password-length" name="password-length" value="8"><br><br>

        <fieldset>
            <legend>要包含的字符：</legend>
            <input type="checkbox" id="include-lowercase" name="include-lowercase" value="yes" checked>
            <label for="include-lowercase">小写字母 (a-z)</label><br>
            <input type="checkbox" id="include-uppercase" name="include-uppercase" value="yes" checked>
            <label for="include-uppercase">大写字母 (A-Z)</label><br>
            <input type="checkbox" id="include-numbers" name="include-numbers" value="yes" checked>
            <label for="include-numbers">数字 (0-9)</label><br>
            <input type="checkbox" id="include-symbols" name="include-symbols" value="yes">
            <label for="include-symbols">特殊符号 (@#$%^&amp;*()_-=+;:,.?)</label><br>
        </fieldset>

        <input type="submit" value="生成密码">
    </form>
    <br>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numPasswords = $_POST["num-passwords"];
        $passwordLength = $_POST["password-length"];
        $includeLowercase = isset($_POST["include-lowercase"]);
        $includeUppercase = isset($_POST["include-uppercase"]);
        $includeNumbers = isset($_POST["include-numbers"]);
        $includeSymbols = isset($_POST["include-symbols"]);

        function randomPassword($length, $includeLowercase, $includeUppercase, $includeNumbers, $includeSymbols) {
            $chars = "";
            if ($includeLowercase) {
            	$chars .= "abcdefghijklmnopqrstuvwxyz";
            }
            if ($includeUppercase) {
            	$chars .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            }
            if ($includeNumbers) {
            	$chars .= "0123456789";
            }
            if ($includeSymbols) {
            	$chars .= "@#$%^&*()_-=+;:,.?";
            }
            $password = substr( str_shuffle( $chars ), 0, $length );
            return $password;
        }

        for ($i = 0; $i < $numPasswords; $i++) {
            $password = randomPassword($passwordLength, $includeLowercase, $includeUppercase, $includeNumbers, $includeSymbols);
            echo $password . "<br>";
        }
    }
    ?>
</body>
</html>
