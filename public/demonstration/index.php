<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM ue");
$ues = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calcul des notes L3 Informatique</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body>

<div class="container">
    <h1>Calcul des notes L3 Informatique</h1>

    <form action="resultat.php" method="POST" id="notesForm">

        <div id="matieres">
            <div class="matiere">
                <h2>Matière 1</h2>

                <label>Matière</label>
                <select name="matiere[]">
                    <?php foreach ($ues as $ue): ?>
                        <option value="<?= htmlspecialchars($ue['matiere']) ?>"><?= htmlspecialchars($ue['matiere']) ?></option>
                    <?php endforeach; ?>
                </select>

                <div class="notes">
                    <div class="field">
                        <label>Contrôle continu</label>
                        <input type="number" name="cc[]" min="0" max="20" required>
                    </div>

                    <div class="field">
                        <label>Partiel</label>
                        <input type="number" name="partiel[]" min="0" max="20" required>
                    </div>

                    <div class="field">
                        <label>Examen</label>
                        <input type="number" name="examen[]" min="0" max="20" required>
                    </div>
                </div>

            </div>
        </div>

        <div class="actions">
            <button type="button" id="addMatiere">➕ Ajouter une matière</button>
            <button type="submit" class="submit">📊 Calculer la moyenne</button>
        </div>

    </form>
</div>

<script>
let compteur = 1;
const maxMatieres = 3;

document.getElementById('addMatiere').addEventListener('click', () => {
    if (compteur >= maxMatieres) return;

    compteur++;

    const matiereDiv = document.createElement('div');
    matiereDiv.classList.add('matiere');

    matiereDiv.innerHTML = `
        <h2>Matière ${compteur}</h2>

        <label>Matière</label>
        <select name="matiere[]">
            <?php foreach ($ues as $ue): ?>
                <option value="<?= htmlspecialchars($ue['matiere']) ?>"><?= htmlspecialchars($ue['matiere']) ?></option>
            <?php endforeach; ?>
        </select>

        <div class="notes">
            <div class="field">
                <label>Contrôle continu</label>
                <input type="number" name="cc[]" min="0" max="20" required>
            </div>

            <div class="field">
                <label>Partiel</label>
                <input type="number" name="partiel[]" min="0" max="20" required>
            </div>

            <div class="field">
                <label>Examen</label>
                <input type="number" name="examen[]" min="0" max="20" required>
            </div>
        </div>
    `;

    document.getElementById('matieres').appendChild(matiereDiv);
});
</script>

</body>
</html>
