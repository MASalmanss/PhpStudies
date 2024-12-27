<?php
if (isset($_POST['sayi1']) && isset($_POST['sayi2'])) {
    $sayi1 = htmlspecialchars($_POST['sayi1']);
    $sayi2 = htmlspecialchars($_POST['sayi2']);

    if (is_numeric($sayi1) && is_numeric($sayi2)) {
        $topla = $sayi1 + $sayi2;
    } else {
        $topla = "Lütfen sadece sayı giriniz.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hesap Makinesi</title>
</head>

<body>
    <h2><a href="http://localhost:8000/index.php">Anasayfa</a></h2>
    <hr>
    <h3>Hesap Makinesi</h3>

    <form method="post">
        <label for="input1">Sayı 1</label>
        <input type="text" name="sayi1" id="input1">
        <br>

        <label for="input2">Sayı 2</label>
        <input type="text" name="sayi2" id="input2">
        <br>
        <br>
        <button type="submit">Gönder</button>
    </form>

    <br>

    <label for="output3">Sonuç</label>
    <input type="text" id="output3" value="<?php echo isset($topla) ? $topla : ''; ?>" readonly>

</body>

</html>