<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PNA-docs</title>
    <style>
        /* Estilos gerais */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Cabeçalho */
        header {
            background-color: #0057b7;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        
        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        /* Seção de Missão */
        .mission-section {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 30px 0;
            overflow: hidden;
        }
        
        .mission-header {
            background-color: #c92127;
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        .mission-content {
            padding: 30px;
        }
        
        .mission-statement {
            font-size: 20px;
            font-weight: 500;
            color: #0057b7;
            margin-bottom: 20px;
            text-align: center;
            line-height: 1.4;
        }
        
        .mission-values {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 40px;
        }
        
        .value-card {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            width: 100%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }
        
        .value-card h3 {
            color: #c92127;
            margin-bottom: 10px;
            font-size: 18px;
        }
        
        .value-card p {
            color: #555;
        }
        
        /* Cores da bandeira angolana */
        .angola-colors {
            height: 10px;
            display: flex;
        }
        
        .angola-colors .red {
            background-color: #c92127;
            flex: 1;
        }
        
        .angola-colors .black {
            background-color: #000000;
            flex: 1;
        }
        
        /* Rodapé */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 40px;
        }
        
        /* Media queries para responsividade */
        @media (min-width: 768px) {
            .value-card {
                width: 48%;
            }
            
            .mission-statement {
                font-size: 24px;
            }
        }
        
        @media (min-width: 992px) {
            .value-card {
                width: 31%;
            }
        }
    </style>
</head>
<body>
    <div class="angola-colors">
        <div class="red"></div>
        <div class="black"></div>
    </div>
    
    <header>
        <div class="container">
            <div class="logo">Recuperação de Documentos Angola</div>
            <p>Seu parceiro na recuperação de documentos perdidos</p>
        </div>
    </header>
    
        <div style="height:150px; background-color:rgb(220, 39, 39);display: flex;
            justify-content: center;
            align-items: center;">
            <form action="../consultadocs/index.php" method="post">
            <input type="text" name="nomee" placeholder="Nome do propretário" style="width:400px; height:50px; border:none; border-radius:40px;padding-left:10px;" >
            <button style="width:150px; height:50px; background-color:#0057b7; border-radius:40px; margin-left:10px; color:white;">Pesquisar</button>
            </form>
        </div>

      <div class="recent-documents">
                    <div class="section-header">
                        <h3>Documentos Recentes</h3>
                    </div>
                    <div class="table-responsive" style="display:flex; justify-content: center;width:100%;">
                        <table style="width:80%; text-align: center;">
                            <thead>
                                <tr>
                                    <th>Img</th>
                                    <th>Tipo</th>
                                    <th>Nome</th>
                                    <th>Data</th>
                                    <th>Local</th>
                                    <th>Status</th>
                                    <th>Descricao</th>
                                </tr>
                            </thead>
                            <tbody>
                                             <?php

$conn = new mysqli("localhost", "root", "", "pna");
$result = $conn->query("SELECT * FROM registo");

while ($row = $result->fetch_assoc()) {
    echo "<tr style='margin:15px 0px;'>";
    echo "<td><img src='../uploads/{$row['image']}' width='100'></td>";
    echo "<td>{$row['tipodoc']}</td>";
    echo "<td>{$row['nome']}</td>";
    echo "<td>{$row['dat']}</td>";
    echo "<td>{$row['localperda']}</td>";
    echo "<td>{$row['statuss']}</td>";
    echo "<td class='action-buttons'>{$row['detalhe']}</td>";
    echo "</tr><hr>";
}
?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    
    <footer>
        <div class="container">
            <p>&copy; 2025 Recuperação de Documentos Angola. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>