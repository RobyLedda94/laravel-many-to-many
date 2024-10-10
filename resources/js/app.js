import './bootstrap';
import '~resources/scss/app.scss';
import '~icons/bootstrap-icons.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


// recupero i bottoni con classe delete
const buttons = document.querySelectorAll('.delete')

// ciclo i bottoni

buttons.forEach((button) => {
    // evento click ai bottoni
    button.addEventListener('click', function (e) {
        // preventDefault
        e.preventDefault();
        // recupero l'id della modal
        const modal = document.getElementById('deletePostModal');

        const bootstrap_modal = new bootstrap.Modal(modal);

        bootstrap_modal.show();

        // recupero il pulsante di conferma cancellazione
        document.querySelector('.confirm').addEventListener('click', function () {
            button.parentElement.submit();
        })
    });
});
