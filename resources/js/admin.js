import Pusher from "pusher-js"
import $ from 'jquery';
import Swal from 'sweetalert2';
import select2 from 'select2';
import * as bootstrap from 'bootstrap';
import Echo from 'laravel-echo';

window.bootstrap = bootstrap;
window.Pusher = Pusher;
window.$ = window.jQuery = $;
window.Swal = Swal;
select2($);
import 'jstree/dist/themes/default/style.min.css';
import 'jstree';



window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
    enabledTransports: ['ws', 'wss'],
});



// Click tog-show
if (document.querySelector(".tog-active")) {
    let togglesShow = document.querySelectorAll(".tog-active");
    togglesShow.forEach((e) => {
        e.addEventListener("click", (evt) => {
            let divActive = document.querySelector(e.getAttribute("data-active"));
            divActive.classList.toggle("active");
        });
    });
}


// Wave Chart
if(document.getElementById('waveChart')) {
    const ctx = document.getElementById('waveChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: '',
                data: [120, 190, 30, 50, 20, 30],
                borderWidth: 1,
                borderColor: '#8D1EE5',
                backgroundColor: '#8D1EE5',
            },
                {
                    label: '',
                    data: [12, 40, 100, 20, 40, 10],
                    borderWidth: 1,
                    borderColor: '#0FC859',
                    backgroundColor: '#0FC859',
                }
            ]
        },
        options: {
            responsive: true,
            interaction: {
                intersect: false,
            },
            scales: {
                x: {
                    display: true,
                },
                y: {
                    display: true,
                    suggestedMin: 0,
                    suggestedMax: 200
                }
            }
        },
    });
}

// print
if (document.getElementById("prt-content") && document.getElementById("btn-prt-content")) {
    const btnPrtContent = document.getElementById("btn-prt-content");
    btnPrtContent.addEventListener("click", printDiv);

    function printDiv() {
        const prtContent = document.getElementById("prt-content");
        newWin = window.open("");
        newWin.document.head.replaceWith(document.head.cloneNode(true));
        newWin.document.body.appendChild(prtContent.cloneNode(true));
        setTimeout(() => {
            newWin.print();
            newWin.close();
        }, 600);
    }
}

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))


