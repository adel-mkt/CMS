<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM ue");
$ues = $stmt->fetchAll();

$moyenne = 0;

foreach ($ues as $ue){
    for ($i = 0; $i < count($_POST['matiere']); $i++) {
        if($ue["matiere"] == $_POST['matiere'][$i]){
            $note_ue = $_POST['cc'][$i] * ($ue["coef_cc"]/100) + $_POST['partiel'][$i] * ($ue["coef_partiel"]/100) + $_POST['examen'][$i] * ($ue["coef_examen"]/100);
            $moyenne += $note_ue * $ue["ects"];
        }
    }
}
$moyenne /= 15; // 15 ects du bloc
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultat des notes</title>
    <link rel="stylesheet" href="./resultat.css">
    <style>
        .mention {
            background-color: <?php echo ($moyenne >= 10) ? '#28a745' : '#dc3545'; ?>;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Résultat des notes</h1>

    <table>
        <tr>
            <th>Matière</th>
            <th>CC</th>
            <th>Partiel</th>
            <th>Examen</th>
            <th>Moyenne</th>
        </tr>
        <?php foreach ($resultats as $res): ?>
            <tr>
                <td><?= htmlspecialchars($res['matiere']) ?></td>
                <td><?= htmlspecialchars($res['cc']) ?></td>
                <td><?= htmlspecialchars($res['partiel']) ?></td>
                <td><?= htmlspecialchars($res['examen']) ?></td>
                <td><?= round($res['moyenne'], 2) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="moyenne-generale">Moyenne générale : <?= round($moyenne, 2) ?></div>
    <div class="mention"><?= ($moyenne >= 10) ? "Admis ✅" : "Non admis ❌"; ?></div>

    <a href="index.php" class="back">← Retour au formulaire</a>
</div>

</body>
</html>
