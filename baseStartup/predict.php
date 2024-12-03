<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previsão de Lucro - Polinômio de Grau 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">

    <div class="container bg-white p-5 rounded shadow">
        <h1 class="text-center mb-4">Previsão de Lucro</h1>
        <p class="text-center mb-4">Polinômio de Grau 3</p>

        <!-- Formulário para envio de valores -->
        <form action="" method="POST">
            <div id="input-container" class="mb-4">
                <div class="mb-3">
                    <label for="rd" class="form-label">Insira o valor de investimento em R&D:</label>
                    <input type="text" class="form-control" id="rd" name="rd" placeholder="Digite o valor de R&D" required>
                </div>
                <div class="mb-3">
                    <label for="marketing" class="form-label">Insira o valor de investimento em Marketing:</label>
                    <input type="text" class="form-control" id="marketing" name="marketing" placeholder="Digite o valor de Marketing" required>
                </div>
            </div>

            <div class="text-center mb-4">
                <button type="submit" class="btn btn-primary">Calcular</button>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Coeficientes para o polinômio de grau 3
            $coeficientes = [
                'A' => 1.9153,
                'B' => -0.2033,
                'C' => -1.93E-5,
                'D' => 1.50E-6,
                'E' => 8.82E-11,
                'F' => -2.66E-12,
                'Intercept' => 42.1614414
            ];

            // Receber os valores do formulário
            $rd = isset($_POST['rd']) ? str_replace(',', '.', $_POST['rd']) : 0;
            $marketing = isset($_POST['marketing']) ? str_replace(',', '.', $_POST['marketing']) : 0;

            // Validar se os valores inseridos são numéricos
            if (is_numeric($rd) && is_numeric($marketing)) {
                // Calcular o resultado com a fórmula do polinômio
                $resultado = 
                    $coeficientes['A'] * $rd +
                    $coeficientes['B'] * $marketing +
                    $coeficientes['C'] * pow($rd, 2) +
                    $coeficientes['D'] * pow($marketing, 2) +
                    $coeficientes['E'] * pow($rd, 3) +
                    $coeficientes['F'] * pow($marketing, 3) +
                    $coeficientes['Intercept'];

                // Exibir o resultado formatado
                echo "<div id='resultado-container' class='text-center mt-4'>";
                echo "<p class='fs-5'>Previsão de lucro:</p>";
                echo "<div id='resultado' class='fs-4 fw-bold text-success'>" . number_format($resultado, 2, ',', '.') . "</div>";
                echo "</div>";
            } else {
                echo "<div class='alert alert-danger text-center mt-4'>Por favor, insira valores válidos.</div>";
            }
        }
        ?>

        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-dark">Voltar</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
