
require('./bootstrap.js');


document.addEventListener('DOMContentLoaded', () => {

    // set time para fechar feedback usuário
    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach((alert) => {
            alert.style.transition = 'opacity 1s';
            alert.style.opacity = 0;
            setTimeout(() => {
                alert.style.display = 'none';
            }, 1000);
        });
    }, 5000);

    // add evento para pegar dado do botão de manager-user, e excluir o usuário
    const modal = document.getElementById('modal-delete');
    const formBtnDelete = document.getElementById('form-btn-modal');

    if(modal){
        modal.addEventListener('show.bs.modal', (event) => {
            let buttonValue = event.relatedTarget;
            let routeDelete = buttonValue.getAttribute('data-dado');
    
            formBtnDelete.action = routeDelete;
        })
    }
});