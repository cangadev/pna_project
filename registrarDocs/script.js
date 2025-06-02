document.addEventListener('DOMContentLoaded', function() {
    // Referências dos elementos
    const form = document.getElementById('documentoForm');
    const successMessage = document.getElementById('successMessage');
    
    // Validação de telefone
    const telefoneInput = document.getElementById('telefone');
    telefoneInput.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9()-]/g, '');
    });
    
    // Submissão do formulário
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        // Verificar se os campos obrigatórios estão preenchidos
        const requiredFields = form.querySelectorAll('[required]');
        let valid = true;
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                valid = false;
                field.style.borderColor = 'red';
            } else {
                field.style.borderColor = '#ddd';
            }
        });
        
        if (valid) {
            // Simulação de envio para o servidor
            setTimeout(function() {
                // Exibir mensagem de sucesso
                successMessage.style.display = 'block';
                
                // Scroll até a mensagem
                successMessage.scrollIntoView({ behavior: 'smooth' });
                
                // Limpar o formulário
                form.reset();
                
                // Ocultar a mensagem após 5 segundos
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 5000);
            }, 1000);
        }
    });
    
    // Navegação suave para as seções
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});