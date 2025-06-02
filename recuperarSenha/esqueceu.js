document.getElementById('passwordResetForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Simulação de validação
    const email = document.getElementById('email').value;
    const registration = document.getElementById('registration').value;
    const errorMessage = document.getElementById('errorMessage');
    const successMessage = document.getElementById('successMessage');
    
    // Limpar mensagens anteriores
    errorMessage.style.display = 'none';
    successMessage.style.display = 'none';
    
    // Exemplo simples de validação (substitua com lógica real do backend)
    if (email.trim() === '' || registration.trim() === '') {
        errorMessage.style.display = 'block';
        return;
    }
    
    // Validação de formato de e-mail (básica)
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        errorMessage.style.display = 'block';
        return;
    }
    
    // Se passar na validação, mostra mensagem de sucesso
    successMessage.style.display = 'block';
});