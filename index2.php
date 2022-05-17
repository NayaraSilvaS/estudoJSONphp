<?php
$adicao = 2 + 5;
$subtracao = 5 - 2;
$multiplicacao = 5 * 2;
$divisao = 5 / 2;
?>
<?php
    $arrayNome = ["Valentina", "Fernanda", "Maria", "Cassandra", "Julia", "Pedro"];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
</head>
    <body>
        <select id="slProfessores" name="slProfessores">
        <?php
        for ($i = 0; $i < count($arrayNome); $i++) {
            ?>
        <option value="<?= $i; ?>"><?=$arrayNome[$i]; ?></option>
        <?php
    }
    ?>
     </select>
     <button onclick="alert(document.getElementById('slProfessores').value);">Selecionar</button>
    <hr>
        <p>2 + 5 = <?=$adicao?></p>
        <p>2 + 5 = <?=$subtracao?></p>
        <p>2 + 5 = <?=$multiplicacao?></p>
        <p>2 + 5 = <?=$divisao?></p>
        <p> <?=($adicao * $subtracao);?></p>
        <hr>
    <?php
        define("min", 17);
        define("max", 45);

        $idade = 10;

        echo "min: " . min . "<br>";
        echo "max: " . max . "<br>";
        echo "Idade: " . $idade . "<br><br>";

        if ($idade >= min && $idade <= max) {
            echo "Acesso liberado...";
        }else{
            echo "Acesso negado!";
        }
    ?>
    <hr>
    <?php
    $cont = 0;
    while ($cont <= 20){
        if ($cont >= 0 && $cont <=20) {
            ?>
            <li><?= $cont; ?></li>
            <?php
        }
        $cont ++;
    }
    ?>
    <hr>
        <ul>
            <?php
            for ($i=1; $i <= 10; $i++) {
                for ($j = 0; $j <= 10; $j++) {
                        ?>
                <li><?= $i ?> * <?= $j; ?> = <?=($i * $j);?></li>
                <?php
                }
                echo "<br>";
            }
        ?>
        </ul>
        <hr>
    </body>
</html>
