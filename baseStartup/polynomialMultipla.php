<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regressão Polinomial Múltipla</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-white text-dark"> 
    <div class="container py-5"> 
        <h1 class="text-center mb-4 fw-bold">Regressão Polinomial Múltipla</h1> 

        <!-- Formulário para seleção do grau da regressão -->
        <form method="GET" class="text-center mb-4">
            <label for="degree" class="form-label">Selecione o Grau:</label>
            <!-- Dropdown (select) com as opções de grau de 1 a 10 -->
            <select name="degree" id="degree" class="form-select w-auto mx-auto">
                <?php for ($i = 1; $i <= 10; $i++): ?> <!-- Gera opções dinamicamente de 1 a 10 -->
                    <option value="<?= $i ?>">Grau <?= $i ?></option> 
                <?php endfor; ?>
            </select>
            <button type="submit" class="btn btn-info mt-3">Exibir</button>
        </form>

        <?php
        // Verifica se o grau foi enviado via GET
        if (isset($_GET['degree'])) {
            $degree = intval($_GET['degree']); 
            $path = "multipla/grau{$degree}/"; 

            // Exibe os resultados correspondentes ao grau selecionado
            echo "<div class='card p-4 shadow bg-light'>"; 
            echo "<h2 class='text-center mb-4'>Grau {$degree}</h2>"; 
            echo "<div class='text-center'>"; 

            
            echo "<img src='{$path}graficR.png' alt='Gráfico R&D Grau {$degree}' class='img-fluid mb-3'>";
            echo "<img src='{$path}graficM.png' alt='Gráfico Marketing Grau {$degree}' class='img-fluid mb-3'>";
            echo "<img src='{$path}coeff.png' alt='Coeficientes Grau {$degree}' class='img-fluid'>";

            echo "</div></div>"; 
        }
        ?>

        <div class="text-center mt-4">
            <a href="graficosMenu.php" class="btn btn-dark">Voltar ao Menu de Gráficos</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
