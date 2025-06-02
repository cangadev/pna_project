
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
                                    <th>Numero</th>
                                    <th>Email</th>
                                    <th>Descricao</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php 
        
$conn = new mysqli("localhost", "root", "", "pna");
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM registo WHERE id=$id");

        while ($res= $result->fetch_assoc()) {
    echo "<tr style='margin:15px 0px;'>";
    echo "<td><img src='../../uploads/{$res['image']}' width='100'></td>";
    echo "<td>{$res['tipodoc']}</td>";
    echo "<td>{$res['nome']}</td>";
    echo "<td>{$res['dat']}</td>";
    echo "<td>{$res['localperda']}</td>";
    echo "<td>{$res['statuss']}</td>";
    echo "<td>{$res['telefone']}</td>";
    echo "<td>{$res['email']}</td>";
    echo "<td class='action-buttons'>{$res['detalhe']}</td>";
    echo "</tr><hr>";
}
    ?>  
    
                            </tbody>
                        </table>  
                        <a href="../index.php">Voltar</a>
</body>
</html>