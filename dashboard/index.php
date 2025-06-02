<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] != 'pnangola') {
    header("Location: ../Login/Login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=menu" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>     
    <title>Admin-PNA</title>
    <style>
        :root {
            --primary-color: #0056b3;
            --secondary-color: #004494;
            --accent-color: #ff9800;
            --background-color: #f4f6f9;
            --text-color: #333;
            --light-color: #ffffff;
            --danger-color: #dc3545;
            --success-color: #28a745;
            --warning-color: #ffc107;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, var(--primary-color), var(--secondary-color));
            color: var(--light-color);
            transition: all 0.3s;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h3 {
            margin-bottom: 10px;
        }

        .logo {
            height: 60px;
            margin-bottom: 10px;
        }

        .menu-items {
            padding: 20px 0;
        }

        .menu-item {
            padding: 15px 20px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .menu-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .menu-item.active {
            background-color: rgba(255, 255, 255, 0.2);
            border-left: 4px solid var(--accent-color);
        }

        .menu-item i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 20px;
            transition: all 0.3s;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            background-color: var(--light-color);
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .toggle-sidebar {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--primary-color);
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-right: 10px;
        }

        /* Dashboard Cards */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .card {
            background-color: var(--light-color);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .card-blue .card-icon {
            background-color: var(--primary-color);
        }

        .card-orange .card-icon {
            background-color: var(--accent-color);
        }

        .card-green .card-icon {
            background-color: var(--success-color);
        }

        .card-red .card-icon {
            background-color: var(--danger-color);
        }

        .card-title {
            font-size: 0.9rem;
            color: #777;
        }

        .card-value {
            font-size: 1.8rem;
            font-weight: bold;
            margin: 5px 0;
        }

        .card-change {
            font-size: 0.8rem;
            display: flex;
            align-items: center;
        }

        .card-change.positive {
            color: var(--success-color);
        }

        .card-change.negative {
            color: var(--danger-color);
        }

        /* Recent Documents Section */
        .recent-documents {
            background-color: var(--light-color);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .view-all {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .view-all:hover {
            text-decoration: underline;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: rgba(0, 0, 0, 0.02);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-pending {
            background-color: rgba(255, 193, 7, 0.1);
            color: var(--warning-color);
        }

        .status-recovered {
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--success-color);
        }

        .status-processing {
            background-color: rgba(0, 123, 255, 0.1);
            color: var(--primary-color);
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.8rem;
            transition: all 0.3s;
        }

        .btn-view {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-edit {
            background-color: var(--warning-color);
            color: white;
        }

        .btn-delete {
            background-color: var(--danger-color);
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }

        /* Form Section */
        .form-section {
            background-color: var(--light-color);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            display: none;
        }

        .form-section.active {
            display: block;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(0, 86, 179, 0.1);
        }

        .form-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            padding: 10px 20px;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
            padding: 10px 20px;
        }

        /* Analytics Section */
        .analytics-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .chart-container {
            background-color: var(--light-color);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            height: 300px;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                position: fixed;
                bottom: 0;
                height: auto;
                box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
            }

            .sidebar-header {
                display: none;
            }

            .menu-items {
                display: flex;
                padding: 0;
                overflow-x: auto;
            }

            .menu-item {
                padding: 15px;
                flex-direction: column;
                text-align: center;
                font-size: 0.8rem;
            }

            .menu-item i {
                margin-right: 0;
                margin-bottom: 5px;
                font-size: 1.2rem;
            }

            .main-content {
                margin-bottom: 80px;
            }

            .card-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .card-icon {
                margin-bottom: 10px;
            }

            .action-buttons {
                flex-direction: column;
            }
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: var(--light-color);
            border-radius: 8px;
            max-width: 600px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            padding: 20px;
            position: relative;
        }

        .close-modal {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 1.5rem;
            cursor: pointer;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <img src="../image/Logo1.png" alt="PNA Logo" class="logo">
                <h3>Sistema de Documentos</h3>
                <p>Polícia Nacional de Angola</p>
            </div>
            <div class="menu-items">
                <div class="menu-item active" data-section="dashboard">
                    <i>📊</i>
                    <span>Dashboard</span>
                </div>
                <div class="menu-item" data-section="new-document">
                    <i>📝</i>
                    <span>Cadastrar Documento</span>
                </div>
                <div class="menu-item" data-section="search">
                    <i>🔍</i>
                    <span>Pesquisar</span>
                </div>
                <div class="menu-item" data-section="analytics">
                    <i>📈</i>
                    <span>Estatísticas</span>
                </div>
                <div class="menu-item">
                    <i>⚙️</i>
                    <span>Configurações</span>
                </div>
                <div class="menu-item">
                    <i>❓</i>
                    <span>Ajuda</span>
                </div>
                <div class="menu-item">
                    <i>🚪</i>
                    <span><a href="./logout.php" style="color:white;">Sair</a></span>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <button class="toggle-sidebar" id="toggleSidebar">☰</button>
                <h2>Dashboard</h2>
                <div class="user-info">
                    <div class="user-avatar">PC</div>
                    <div>
                        <p>Oficial PNA</p>
                        <small>Admin</small>
                    </div>
                </div>
            </div>

            <!-- Dashboard Section -->
            <div class="content-section active" id="dashboard-section">
                <div class="dashboard-cards">
                    <div class="card card-blue">
                        <div class="card-header">
                            <div>
                                <div class="card-title">Total de Documentos</div>
                                <div class="card-value">1,258</div>
                                <div class="card-change positive">+8% <i>↑</i></div>
                            </div>
                            <div class="card-icon">📄</div>
                        </div>
                    </div>
                    <div class="card card-orange">
                        <div class="card-header">
                            <div>
                                <div class="card-title">Documentos Pendentes</div>
                                <div class="card-value">243</div>
                                <div class="card-change negative">+12% <i>↑</i></div>
                            </div>
                            <div class="card-icon">⏳</div>
                        </div>
                    </div>
                    <div class="card card-green">
                        <div class="card-header">
                            <div>
                                <div class="card-title">Documentos Devolvidos</div>
                                <div class="card-value">856</div>
                                <div class="card-change positive">+5% <i>↑</i></div>
                            </div>
                            <div class="card-icon">✅</div>
                        </div>
                    </div>
                    <div class="card card-red">
                        <div class="card-header">
                            <div>
                                <div class="card-title">Documentos Expirados</div>
                                <div class="card-value">159</div>
                                <div class="card-change negative">-3% <i>↓</i></div>
                            </div>
                            <div class="card-icon">⚠️</div>
                        </div>
                    </div>
                </div>

                <div class="recent-documents">
                    <div class="section-header">
                        <h3>Documentos Recentes</h3>
                        <a href="#" class="view-all">Ver Todos</a>
                    </div>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Img</th>
                                    <th>Tipo</th>
                                    <th>Nome</th>
                                    <th>Data</th>
                                    <th>Local</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                             <?php

$conn = new mysqli("localhost", "root", "", "pna");
$result = $conn->query("SELECT * FROM registo");

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td><img src='../uploads/{$row['image']}' width='100'></td>";
    echo "<td>{$row['tipodoc']}</td>";
    echo "<td>{$row['nome']}</td>";
    echo "<td>{$row['dat']}</td>";
    echo "<td>{$row['localperda']}</td>";
    echo "<td>{$row['statuss']}</td>";
    echo "<td class='action-buttons'>";
    echo "<a href='./cruddocs/Ver.php?id={$row['id']}'><button class='btn btn-view'>Ver</button></a>";
    echo "<a href='./cruddocs/editar.php?id={$row['id']}'><button class='btn btn-edit'>Editar</button></a>";
    echo "<a href='./cruddocs/delete.php?id={$row['id']}'><button class='btn btn-delete'>Apagar</button></a>";
    echo "</td>";
    echo "</tr><hr>";
}
?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- New Document Section -->
            <div class="content-section form-section" id="new-document-section">
                <div class="section-header">
                    <h3>Cadastrar Novo Documento</h3>
                </div>
                <form id="document-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="doc-type">Tipo de Documento</label>
                            <select class="form-control" id="doc-type" required>
                                <option value="">Selecione o tipo</option>
                                <option value="BI">Bilhete de Identidade</option>
                                <option value="CC">Carta de Condução</option>
                                <option value="PP">Passaporte</option>
                                <option value="CE">Cartão de Eleitor</option>
                                <option value="OT">Outro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="doc-number">Número do Documento</label>
                            <input type="text" class="form-control" id="doc-number" placeholder="Ex: 00123456LA012" required>
                        </div>
                        <div class="form-group">
                            <label for="doc-status">Estado</label>
                            <select class="form-control" id="doc-status" required>
                                <option value="pending">Pendente</option>
                                <option value="processing">Em Processamento</option>
                                <option value="recovered">Devolvido</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="owner-name">Nome do Proprietário</label>
                            <input type="text" class="form-control" id="owner-name" placeholder="Nome completo" required>
                        </div>
                        <div class="form-group">
                            <label for="owner-contact">Contacto</label>
                            <input type="tel" class="form-control" id="owner-contact" placeholder="912 345 678">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="found-date">Data de Encontro</label>
                            <input type="date" class="form-control" id="found-date" required>
                        </div>
                        <div class="form-group">
                            <label for="found-location">Local</label>
                            <input type="text" class="form-control" id="found-location" placeholder="Província, Município, Bairro" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comments">Observações</label>
                        <textarea class="form-control" id="comments" rows="3" placeholder="Informações adicionais sobre o documento ou as circunstâncias em que foi encontrado"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="doc-photo">Foto do Documento (opcional)</label>
                        <input type="file" class="form-control" id="doc-photo">
                    </div>
                    <div class="form-buttons">
                        <button type="reset" class="btn btn-secondary">Limpar</button>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>

            <!-- Search Section -->
            <div class="content-section form-section" id="search-section">
                <div class="section-header">
                    <h3>Pesquisar Documentos</h3>
                </div>
                <form id="search-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="search-type">Tipo de Pesquisa</label>
                            <select class="form-control" id="search-type">
                                <option value="doc-number">Número do Documento</option>
                                <option value="owner-name">Nome do Proprietário</option>
                                <option value="doc-type">Tipo de Documento</option>
                                <option value="location">Local de Encontro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="search-query">Termo de Pesquisa</label>
                            <input type="text" class="form-control" id="search-query" placeholder="Digite sua pesquisa">
                        </div>
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-primary form-control">Pesquisar</button>
                        </div>
                    </div>
                </form>
                <div class="search-results mt-4">
                    <div class="section-header">
                        <h4>Resultados da Pesquisa</h4>
                    </div>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tipo</th>
                                    <th>Nome</th>
                                    <th>Data</th>
                                    <th>Local</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody id="search-results">
                                <!-- Search results will be added here -->
                                <tr>
                                    <td colspan="7" style="text-align: center;">Faça uma pesquisa para ver os resultados</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Analytics Section -->
            <div class="content-section" id="analytics-section">
                <div class="section-header">
                    <h3>Estatísticas</h3>
                </div>
                <div class="analytics-row">
                    <div class="chart-container">
                        <h4>Documentos por Mês</h4>
                        <canvas id="monthlyChart"></canvas>
                    </div>
                    <div class="chart-container">
                        <h4>Documentos por Tipo</h4>
                        <canvas id="typeChart"></canvas>
                    </div>
                </div>
                <div class="analytics-row">
                    <div class="chart-container">
                        <h4>Documentos por Província</h4>
                        <canvas id="locationChart"></canvas>
                    </div>
                    <div class="chart-container">
                        <h4>Taxa de Devolução</h4>
                        <canvas id="recoveryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="documentModal">
        <div class="modal-content">
            <span class="close-modal" id="closeModal">&times;</span>
            <h3>Detalhes do Documento</h3>
            <div id="modal-content">
                <!-- Modal content will be added here -->
            </div>
        </div>
    </div>

    <!-- Add Chart.js from CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>

    <script>
        // Toggle Sidebar
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.querySelector('.main-content').classList.toggle('expanded');
        });

        // Section Navigation
        const menuItems = document.querySelectorAll('.menu-item');
        const contentSections = document.querySelectorAll('.content-section');

        menuItems.forEach(item => {
            item.addEventListener('click', function() {
                const sectionId = this.getAttribute('data-section');
                if (!sectionId) return;

                // Update active menu item
                menuItems.forEach(i => i.classList.remove('active'));
                this.classList.add('active');

                // Update page title in header
                document.querySelector('.header h2').textContent = this.querySelector('span').textContent;

                // Show selected section
                contentSections.forEach(section => {
                    section.classList.remove('active');
                });
                document.getElementById(`${sectionId}-section`).classList.add('active');
            });
        });

        // Form Submit
        document.getElementById('document-form').addEventListener('submit', function(e) {
            e.preventDefault();
            // In a real application, you would handle form submission to the server here
            alert('Documento cadastrado com sucesso!');
            this.reset();
        });

        // Search Form
        document.getElementById('search-form').addEventListener('submit', function(e) {
            e.preventDefault();
            // Demo search functionality
            const searchType = document.getElementById('search-type').value;
            const searchQuery = document.getElementById('search-query').value;
            
            if (searchQuery.trim() === '') {
                alert('Por favor, digite um termo para pesquisar');
                return;
            }
            
            // In a real application, you would fetch data from the server
            // For demo purposes, we'll show sample results
            const resultsHtml = `
                <tr>
                    <td>#DOC-1234</td>
                    <td>Bilhete de Identidade</td>
                    <td>João Manuel Silva</td>
                    <td>05/05/2025</td>
                    <td>Luanda, Talatona</td>
                    <td><span class="status status-pending">Pendente</span></td>
                    <td class="action-buttons">
                        <button class="btn btn-view" data-id="1234">Ver</button>
                        <button class="btn btn-edit">Editar</button>
                        <button class="btn btn-delete">Apagar</button>
                    </td>
                </tr>
                <tr>
                    <td>#DOC-1233</td>
                    <td>Carta de Condução</td>
                    <td>Maria Antónia Neto</td>
                    <td>04/05/2025</td>
                    <td>Luanda, Kilamba</td>
                    <td><span class="status status-recovered">Devolvido</span></td>
                    <td class="action-buttons">
                        <button class="btn btn-view" data-id="1233">Ver</button>
                        <button class="btn btn-edit">Editar</button>
                        <button class="btn btn-delete">Apagar</button>
                    </td>
                </tr>
            `;
            
            document.getElementById('search-results').innerHTML = resultsHtml;
            
            // Add event listeners to view buttons
            document.querySelectorAll('.btn-view').forEach(btn => {
                btn.addEventListener('click', function() {
                    openDocumentModal(this.getAttribute('data-id'));
                });
            });
        });

        // Modal functions
        const modal = document.getElementById('documentModal');
        const closeModal = document.getElementById('closeModal');

        function openDocumentModal(docId) {
            // In a real application, you would fetch document details from the server
            // For demo purposes, we'll show sample details
            const documentDetails = `
                <div class="form-row">
                    <div class="form-group">
                        <label>ID do Documento</label>
                        <p>#DOC-${docId}</p>
                    </div>
                    <div class="form-group">
                        <label>Tipo</label>
                        <p>Bilhete de Identidade</p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Nome do Proprietário</label>
                        <p>João Manuel Silva</p>
                    </div>
                    <div class="form-group">
                        <label>Contacto</label>
                        <p>912 345 678</p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Data de Encontro</label>
                        <p>05/05/2025</p>
                    </div>
                    <div class="form-group">
                        <label>Local</label>
                        <p>Luanda, Talatona</p>
                    </div>
                </div>
                <div class="form-group">
                    <label>Estado</label>
                    <p><span class="status status-pending">Pendente</span></p>
                </div>
                <div class="form-group">
                    <label>Observações</label>
                    <p>Documento encontrado na via pública próximo ao centro comercial.</p>
                </div>
                <div class="form-buttons">
                    <button class="btn btn-primary" onclick="closeDocumentModal()">Fechar</button>
                </div>
            `;
            
            document.getElementById('modal-content').innerHTML = documentDetails;
            modal.style.display = 'flex';
        }

        function closeDocumentModal() {
            modal.style.display = 'none';
        }

        closeModal.addEventListener('click', closeDocumentModal);

        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                closeDocumentModal();
            }
        });

        // Initialize Charts
        function initCharts() {
            // Monthly Chart
            const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
            const monthlyChart = new Chart(monthlyCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                    datasets: [{
                        label: 'Documentos Cadastrados',
                        data: [65, 78, 90, 81, 56, 55, 40, 45, 60, 70, 85, 95],
                        fill: false,
                        borderColor: '#0056b3',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            // Document Types Chart
            const typeCtx = document.getElementById('typeChart').getContext('2d');
            const typeChart = new Chart(typeCtx, {
                type: 'pie',
                data: {
                    labels: ['Bilhete de Identidade', 'Carta de Condução', 'Passaporte', 'Cartão de Eleitor', 'Outros'],
                    datasets: [{
                        data: [45, 25, 15, 10, 5],
                        backgroundColor: [
                            '#0056b3',
                            '#ff9800',
                            '#28a745',
                            '#dc3545',
                            '#6c757d'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            // Location Chart
            const locationCtx = document.getElementById('locationChart').getContext('2d');
            const locationChart = new Chart(locationCtx, {
                type: 'bar',
                data: {
                    labels: ['Luanda', 'Benguela', 'Huambo', 'Cabinda', 'Huíla', 'Bié'],
                    datasets: [{
                        label: 'Documentos por Província',
                        data: [580, 220, 150, 120, 100, 88],
                        backgroundColor: '#0056b3'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            // Recovery Rate Chart
            const recoveryCtx = document.getElementById('recoveryChart').getContext('2d');
            const recoveryChart = new Chart(recoveryCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Devolvidos', 'Pendentes', 'Em Processamento'],
                    datasets: [{
                        data: [68, 19, 13],
                        backgroundColor: [
                            '#28a745',
                            '#ff9800',
                            '#0056b3'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        }

        // Initialize charts when analytics section is shown
        document.querySelector('[data-section="analytics"]').addEventListener('click', function() {
            // Wait for the DOM to update
            setTimeout(initCharts, 100);
        });

        // Action buttons in the table
        document.querySelectorAll('.btn-view').forEach(btn => {
            btn.addEventListener('click', function() {
                const docId = this.closest('tr').querySelector('td:first-child').textContent.replace('#DOC-', '');
                openDocumentModal(docId);
            });
        });

        document.querySelectorAll('.btn-edit').forEach(btn => {
            btn.addEventListener('click', function() {
                const docId = this.closest('tr').querySelector('td:first-child').textContent;
                alert(`Editar documento ${docId}`);
                // In a real application, you would redirect to an edit page or open an edit modal
            });
        });

        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function() {
                const docId = this.closest('tr').querySelector('td:first-child').textContent;
                if (confirm(`Tem certeza que deseja apagar o documento ${docId}?`)) {
                    // In a real application, you would send a delete request to the server
                    this.closest('tr').remove();
                    alert('Documento apagado com sucesso!');
                }
            });
        });

        // Mobile responsive sidebar
        if (window.innerWidth <= 768) {
            document.getElementById('sidebar').classList.add('collapsed');
            document.querySelector('.main-content').classList.add('expanded');
        }

        // Responsive adjustment on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth <= 768) {
                document.getElementById('sidebar').classList.add('collapsed');
                document.querySelector('.main-content').classList.add('expanded');
            }
        });

        // Initialize the application
        document.addEventListener('DOMContentLoaded', function() {
            // Show dashboard section by default
            document.getElementById('dashboard-section').classList.add('active');
        });

        // Toggle Sidebar
document.getElementById('toggleSidebar').addEventListener('click', function() {
    document.getElementById('sidebar').classList.toggle('collapsed');
    document.querySelector('.main-content').classList.toggle('expanded');
});

// Section Navigation
const menuItems = document.querySelectorAll('.menu-item');
const contentSections = document.querySelectorAll('.content-section');

menuItems.forEach(item => {
    item.addEventListener('click', function() {
        const sectionId = this.getAttribute('data-section');
        if (!sectionId) return;

        // Update active menu item
        menuItems.forEach(i => i.classList.remove('active'));
        this.classList.add('active');

        // Update page title in header
        document.querySelector('.header h2').textContent = this.querySelector('span').textContent;

        // Show selected section
        contentSections.forEach(section => {
            section.classList.remove('active');
        });
        document.getElementById(`${sectionId}-section`).classList.add('active');
    });
});

// Form Submit
document.getElementById('document-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Validate form
    const docType = document.getElementById('doc-type').value;
    const docNumber = document.getElementById('doc-number').value;
    const ownerName = document.getElementById('owner-name').value;
    const foundDate = document.getElementById('found-date').value;
    const foundLocation = document.getElementById('found-location').value;
    
    if (!docType || !docNumber || !ownerName || !foundDate || !foundLocation) {
        alert('Por favor, preencha todos os campos obrigatórios');
        return;
    }
    
    // Generate random document ID
    const docId = `DOC-${Math.floor(1000 + Math.random() * 9000)}`;
    
    // In a real application, you would send data to the server
    // For demo, we'll just simulate adding to the table
    addDocumentToTable(docId, docType, docNumber, ownerName, foundDate, foundLocation);
    
    alert('Documento cadastrado com sucesso!');
    this.reset();
    
    // Navigate to dashboard to show the updated table
    document.querySelector('[data-section="dashboard"]').click();
});

// Function to add document to the table
function addDocumentToTable(docId, docType, docNumber, ownerName, foundDate, foundLocation) {
    const tbody = document.querySelector('.recent-documents table tbody');
    const newRow = document.createElement('tr');
    
    // Format the date
    const dateObj = new Date(foundDate);
    const formattedDate = `${dateObj.getDate().toString().padStart(2, '0')}/${(dateObj.getMonth() + 1).toString().padStart(2, '0')}/${dateObj.getFullYear()}`;
    
    // Get document type text
    let docTypeText = '';
    switch(docType) {
        case 'BI': docTypeText = 'Bilhete de Identidade'; break;
        case 'CC': docTypeText = 'Carta de Condução'; break;
        case 'PP': docTypeText = 'Passaporte'; break;
        case 'CE': docTypeText = 'Cartão de Eleitor'; break;
        case 'OT': docTypeText = 'Outro'; break;
    }
    
    newRow.innerHTML = `
        <td>#${docId}</td>
        <td>${docTypeText}</td>
        <td>${ownerName}</td>
        <td>${formattedDate}</td>
        <td>${foundLocation}</td>
        <td><span class="status status-pending">Pendente</span></td>
        <td class="action-buttons">
            <button class="btn btn-view" data-id="${docId}">Ver</button>
            <button class="btn btn-edit" data-id="${docId}">Editar</button>
            <button class="btn btn-delete" data-id="${docId}">Apagar</button>
        </td>
    `;
    
    // Add the new row at the top of the table
    if (tbody.firstChild) {
        tbody.insertBefore(newRow, tbody.firstChild);
    } else {
        tbody.appendChild(newRow);
    }
    
    // Update the document counter
    updateDocumentCounters(1, 1, 0, 0);
    
    // Attach event listeners to the new buttons
    attachActionButtonListeners(newRow);
}

// Function to update document counters
function updateDocumentCounters(total, pending, recovered, expired) {
    const counterElements = document.querySelectorAll('.card-value');
    
    // Get current values
    const currentTotal = parseInt(counterElements[0].textContent.replace(/,/g, ''));
    const currentPending = parseInt(counterElements[1].textContent.replace(/,/g, ''));
    const currentRecovered = parseInt(counterElements[2].textContent.replace(/,/g, ''));
    const currentExpired = parseInt(counterElements[3].textContent.replace(/,/g, ''));
    
    // Update values
    counterElements[0].textContent = formatNumber(currentTotal + total);
    counterElements[1].textContent = formatNumber(currentPending + pending);
    counterElements[2].textContent = formatNumber(currentRecovered + recovered);
    counterElements[3].textContent = formatNumber(currentExpired + expired);
}

// Format number with commas for thousands
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

// Search Form
document.getElementById('search-form').addEventListener('submit', function(e) {
    e.preventDefault();
    // Demo search functionality
    const searchType = document.getElementById('search-type').value;
    const searchQuery = document.getElementById('search-query').value;
    
    if (searchQuery.trim() === '') {
        alert('Por favor, digite um termo para pesquisar');
        return;
    }
    
    // In a real application, you would fetch data from the server
    // For demo purposes, we'll show sample results
    const resultsHtml = `
        <tr>
            <td>#DOC-1234</td>
            <td>Bilhete de Identidade</td>
            <td>João Manuel Silva</td>
            <td>05/05/2025</td>
            <td>Luanda, Talatona</td>
            <td><span class="status status-pending">Pendente</span></td>
            <td class="action-buttons">
                <button class="btn btn-view" data-id="1234">Ver</button>
                <button class="btn btn-edit" data-id="1234">Editar</button>
                <button class="btn btn-delete" data-id="1234">Apagar</button>
            </td>
        </tr>
        <tr>
            <td>#DOC-1233</td>
            <td>Carta de Condução</td>
            <td>Maria Antónia Neto</td>
            <td>04/05/2025</td>
            <td>Luanda, Kilamba</td>
            <td><span class="status status-recovered">Devolvido</span></td>
            <td class="action-buttons">
                <button class="btn btn-view" data-id="1233">Ver</button>
                <button class="btn btn-edit" data-id="1233">Editar</button>
                <button class="btn btn-delete" data-id="1233">Apagar</button>
            </td>
        </tr>
    `;
    
    document.getElementById('search-results').innerHTML = resultsHtml;
    
    // Add event listeners to search result buttons
    attachActionButtonListeners(document.getElementById('search-results'));
});

// Modal functions
const modal = document.getElementById('documentModal');
const closeModal = document.getElementById('closeModal');

function openDocumentModal(docId) {
    // In a real application, you would fetch document details from the server
    // For demo purposes, we'll show sample details
    const documentDetails = 
        <div class="form-row">
            <div class="form-group">
                <label>ID do Documento</label>
                <p>#DOC-${docId}</p>
            </div>
            <div class="form-group">
                <label>Tipo</label>
                <p>Bilhete de Identidade</p>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Nome do Proprietário</label>
                <p>João Manuel Silva</p>
            </div>
            <div class="form-group">
                <label>Contacto</label>
                <p>912 345 678</p>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Data de Encontro</label>
                <p>05/05/2025</p>
            </div>
            <div class="form-group">
                <label>Local</label>
                <p>Luanda, Talatona</p>
            </div>
        </div>
        <div class="form-group">
            <label>Estado</label>
            <p><span class="status status-pending">Pendente</span></p>
        </div>
        <div class="form-group">
            <label>Observações</label>
            <p>Documento encontrado na via pública próximo ao centro comercial.</p>
        </div>
        <div class="form-buttons">
            <button class="btn btn-primary" onclick="closeDocumentModal()">Fechar</button>
            <button class="btn btn-success" onclick="markAsRecovered('${docId}')">Marcar como Devolvido</button>
        </div>
    `;
    
    document.getElementById('modal-content').innerHTML = documentDetails;
    modal.style.display = 'flex';
}

function closeDocumentModal() {
    modal.style.display = 'none';
}

function markAsRecovered(docId) {
    // Find the row with the matching docId
    const rows = document.querySelectorAll('tbody tr');
    for (let row of rows) {
        const rowId = row.querySelector('td:first-child').textContent;
        if (rowId === `#DOC-${docId}`) {
            // Update status in the table
            const statusCell = row.querySelector('.status');
            statusCell.className = 'status status-recovered';
            statusCell.textContent = 'Devolvido';
            
            // Update counters
            updateDocumentCounters(0, -1, 1, 0);
            
            // Close modal and show confirmation
            closeDocumentModal();
            alert(`Documento #DOC-${docId} marcado como devolvido com sucesso!`);
            return;
        }
    }
}

closeModal.addEventListener('click', closeDocumentModal);

window.addEventListener('click', function(event) {
    if (event.target === modal) {
        closeDocumentModal();
    }
});

// Function to attach action button event listeners
function attachActionButtonListeners(container) {
    // View buttons
    const viewButtons = container.querySelectorAll ? container.querySelectorAll('.btn-view') : document.querySelectorAll('.btn-view');
    viewButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const docId = this.getAttribute('data-id');
            openDocumentModal(docId);
        });
    });

    // Edit buttons
    const editButtons = container.querySelectorAll ? container.querySelectorAll('.btn-edit') : document.querySelectorAll('.btn-edit');
    editButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const docId = this.getAttribute('data-id');
            openEditModal(docId);
        });
    });

    // Delete buttons
    const deleteButtons = container.querySelectorAll ? container.querySelectorAll('.btn-delete') : document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const docId = this.getAttribute('data-id');
            deleteDocument(docId);
        });
    });
}

// Function to open edit modal for a document
function openEditModal(docId) {
    // Navigate to the form section
    document.querySelector('[data-section="new-document"]').click();
    
    // Pre-fill form with document data (in a real app, fetch from server)
    document.getElementById('doc-type').value = 'BI';
    document.getElementById('doc-number').value = '00123456LA012';
    document.getElementById('owner-name').value = 'João Manuel Silva';
    document.getElementById('owner-contact').value = '912 345 678';
    document.getElementById('found-date').value = '2025-05-05';
    document.getElementById('found-location').value = 'Luanda, Talatona';
    document.getElementById('comments').value = 'Documento encontrado na via pública próximo ao centro comercial.';
    
    // Change form title and button text
    document.querySelector('#new-document-section .section-header h3').textContent = 'Editar Documento';
    document.querySelector('#document-form .btn-primary').textContent = 'Atualizar';
    
    // Store document ID for update
    document.getElementById('document-form').setAttribute('data-editing', docId);
}

// Function to delete a document
function deleteDocument(docId) {
    if (confirm(`Tem certeza que deseja apagar o documento #DOC-${docId}?`)) {
        // Find and remove the row
        const rows = document.querySelectorAll('tbody tr');
        for (let row of rows) {
            const rowId = row.querySelector('td:first-child').textContent;
            if (rowId === `#DOC-${docId}`) {
                // Get status before removal
                const statusCell = row.querySelector('.status');
                let pendingDelta = 0, recoveredDelta = 0, expiredDelta = 0;
                
                if (statusCell.classList.contains('status-pending')) pendingDelta = -1;
                else if (statusCell.classList.contains('status-recovered')) recoveredDelta = -1;
                else if (statusCell.classList.contains('status-processing')) pendingDelta = -1;
                
                // Remove the row
                row.remove();
                
                // Update counters
                updateDocumentCounters(-1, pendingDelta, recoveredDelta, expiredDelta);
                
                alert(`Documento #DOC-${docId} apagado com sucesso!`);
                break;
            }
        }
    }
}

// Initialize Charts
function initCharts() {
    // Clear existing charts if they exist
    const chartIds = ['monthlyChart', 'typeChart', 'locationChart', 'recoveryChart'];
    chartIds.forEach(id => {
        const canvas = document.getElementById(id);
        if (canvas) {
            const ctx = canvas.getContext('2d');
            const existingChart = Chart.getChart(ctx);
            if (existingChart) {
                existingChart.destroy();
            }
        }
    });

    // Monthly Chart
    const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
    const monthlyChart = new Chart(monthlyCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            datasets: [{
                label: 'Documentos Cadastrados',
                data: [65, 78, 90, 81, 56, 55, 40, 45, 60, 70, 85, 95],
                fill: false,
                borderColor: '#0056b3',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });

    // Document Types Chart
    const typeCtx = document.getElementById('typeChart').getContext('2d');
    const typeChart = new Chart(typeCtx, {
        type: 'pie',
        data: {
            labels: ['Bilhete de Identidade', 'Carta de Condução', 'Passaporte', 'Cartão de Eleitor', 'Outros'],
            datasets: [{
                data: [45, 25, 15, 10, 5],
                backgroundColor: [
                    '#0056b3',
                    '#ff9800',
                    '#28a745',
                    '#dc3545',
                    '#6c757d'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right',
                }
            }
        }
    });

    // Location Chart
    const locationCtx = document.getElementById('locationChart').getContext('2d');
    const locationChart = new Chart(locationCtx, {
        type: 'bar',
        data: {
            labels: ['Luanda', 'Benguela', 'Huambo', 'Cabinda', 'Huíla', 'Bié'],
            datasets: [{
                label: 'Documentos por Província',
                data: [580, 220, 150, 120, 100, 88],
                backgroundColor: '#0056b3'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Recovery Rate Chart
    const recoveryCtx = document.getElementById('recoveryChart').getContext('2d');
    const recoveryChart = new Chart(recoveryCtx, {
        type: 'doughnut',
        data: {
            labels: ['Devolvidos', 'Pendentes', 'Em Processamento'],
            datasets: [{
                data: [68, 19, 13],
                backgroundColor: [
                    '#28a745',
                    '#ff9800',
                    '#0056b3'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });
}

// Generate random data for charts
function generateRandomData() {
    return Array.from({length: 12}, () => Math.floor(Math.random() * 100) + 10);
}

// Function to update charts with new data
function updateCharts() {
    const charts = Chart.getChart(document.getElementById('monthlyChart').getContext('2d'));
    if (charts) {
        charts.data.datasets[0].data = generateRandomData();
        charts.update();
    }
}

// Refresh charts button
function addRefreshChartsButton() {
    const analyticsHeader = document.querySelector('#analytics-section .section-header');
    if (!document.getElementById('refresh-charts')) {
        const refreshButton = document.createElement('button');
        refreshButton.id = 'refresh-charts';
        refreshButton.className = 'btn btn-primary';
        refreshButton.innerHTML = 'Atualizar Gráficos';
        refreshButton.addEventListener('click', updateCharts);
        analyticsHeader.appendChild(refreshButton);
    }
}

// Initialize charts when analytics section is shown
document.querySelector('[data-section="analytics"]').addEventListener('click', function() {
    // Wait for the DOM to update
    setTimeout(() => {
        initCharts();
        addRefreshChartsButton();
    }, 100);
});

// Attach event listeners to existing action buttons
document.addEventListener('DOMContentLoaded', function() {
    // Attach action buttons event listeners
    attachActionButtonListeners(document);
    
    // Show dashboard section by default
    document.getElementById('dashboard-section').classList.add('active');
    
    // Add date picker max date
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('found-date').setAttribute('max', today);
    
    // Export function (for PDF/Excel)
    addExportButtons();
    
    // Mobile responsive sidebar
    if (window.innerWidth <= 768) {
        document.getElementById('sidebar').classList.add('collapsed');
        document.querySelector('.main-content').classList.add('expanded');
    }
});

// Function to add export buttons
function addExportButtons() {
    const recentDocsHeader = document.querySelector('.recent-documents .section-header');
    
    // Create export buttons container
    const exportContainer = document.createElement('div');
    exportContainer.className = 'export-buttons';
    exportContainer.style.display = 'flex';
    exportContainer.style.gap = '10px';
    
    // Create PDF export button
    const pdfButton = document.createElement('button');
    pdfButton.className = 'btn btn-primary';
    pdfButton.innerHTML = 'Exportar PDF';
    pdfButton.addEventListener('click', exportToPDF);
    
    // Create Excel export button
    const excelButton = document.createElement('button');
    excelButton.className = 'btn btn-success';
    excelButton.innerHTML = 'Exportar Excel';
    excelButton.addEventListener('click', exportToExcel);
    
    // Add buttons to container
    exportContainer.appendChild(pdfButton);
    exportContainer.appendChild(excelButton);
    
    // Remove "View All" link and replace with export buttons
    const viewAllLink = recentDocsHeader.querySelector('.view-all');
    if (viewAllLink) {
        recentDocsHeader.replaceChild(exportContainer, viewAllLink);
    } else {
        recentDocsHeader.appendChild(exportContainer);
    }
}

// Export to PDF function (mock)
function exportToPDF() {
    alert('Exportando para PDF... Esta funcionalidade estaria integrada com uma biblioteca como jsPDF em uma aplicação real.');
}

// Export to Excel function (mock)
function exportToExcel() {
    alert('Exportando para Excel... Esta funcionalidade estaria integrada com uma biblioteca como SheetJS em uma aplicação real.');
}

// Responsive adjustment on window resize
window.addEventListener('resize', function() {
    if (window.innerWidth <= 768) {
        document.getElementById('sidebar').classList.add('collapsed');
        document.querySelector('.main-content').classList.add('expanded');
    }
});