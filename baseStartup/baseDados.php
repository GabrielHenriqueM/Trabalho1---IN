<?php
// Caminho para o arquivo CSV
$arquivo = '50_Startups.csv';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de Dados</title>
    <!-- Link do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Base de Dados</h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <?php
                        // Exibe o cabeçalho do CSV
                        if (($handle = fopen($arquivo, "r")) !== false) {
                            $header = fgetcsv($handle, 1000, ",");
                            if ($header) {
                                foreach ($header as $coluna) {
                                    echo "<th>" . htmlspecialchars($coluna) . "</th>";
                                }
                            }
                            fclose($handle);
                        } else {
                            echo "<th colspan='5'>Erro ao carregar o cabeçalho</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Verifica se o arquivo CSV existe
                    if (file_exists($arquivo)) {
                        if (($handle = fopen($arquivo, "r")) !== false) {
                            $linha = 0;
                            while (($dados = fgetcsv($handle, 1000, ",")) !== false) {
                                if ($linha > 0) { // Ignora a primeira linha (cabeçalho)
                                    echo "<tr>";
                                    foreach ($dados as $campo) {
                                        echo "<td>" . htmlspecialchars($campo) . "</td>";
                                    }
                                    echo "</tr>";
                                }
                                $linha++;
                            }
                            fclose($handle);
                        } else {
                            echo "<tr><td colspan='5'>Erro ao abrir o arquivo CSV.</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Arquivo CSV não encontrado.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="text-center mb-5"> 
            <a href="index.php" class="btn btn-dark">Voltar</a>
        </div>
    </div>
    <!-- Script do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
