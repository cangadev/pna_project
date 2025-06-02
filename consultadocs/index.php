

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items:center;
        }
        body td{
            background-color:silver;
           padding:10px 20px; 
        }
        a{
            margin-top:20px;
            text-decoration:none;
            font-size:20px;
        }
    </style>
</head>
<body>
    <h2>Resultado:</h2>
     <table style="text-align: center;">
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
        $nome = $_POST["nomee"];

        $result = $conn->query("SELECT * FROM registo WHERE nome='$nome'");

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
                        <a href="../docsPerdidos/index.php">Voltar</a>
</body>
</html>