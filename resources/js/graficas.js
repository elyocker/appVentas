 // grafica 1
 var ctx = document.getElementById('grafica1');
 var myChart = new Chart(ctx, {
     type: 'polarArea',
     data: {
         labels: ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'],
         datasets: [{
             label: '# of Votes',
             data: [12, 19, 3, 5, 2, 3,20],
             backgroundColor: [
                 'rgba(54, 100, 235, 0.2)',
                 'rgba(54, 162, 235, 0.2)',
                 'rgba(255, 206, 86, 0.2)',
                 'rgba(75, 192, 192, 0.2)',
                 'rgba(153, 102, 255, 0.2)',
                 'rgba(255, 159, 64, 0.2)'
             ],
             
         }]
     },
    options:{
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }   
     }
 });
//  ==========================================
//         grafica 2
//  ==========================================
 var ctx = document.getElementById('grafica2');
 var lunes = "#4359FE";
 var martes = "#EBD609";
 var miercoles = "#3ECED5";
 var jueves = "#F8A330";
 var viernes = "#BA07CF";
 var sabado = "#F74983";
 var domingo = "#02A320";

 var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
        datasets:[{
            data:[19,20,19,34,25,20,40],
            backgroundColor:[lunes,martes,miercoles,jueves, viernes, sabado, domingo],
            label:'datos'
        }],
        labels:['Lunes','Martes', 'Miercoles', 'Jueves','Viernes','Sabado','Domingo']
        
    },
    options:{
        responsive: true   
    }
});
//  ==========================================
//         grafica 3
//  ==========================================
var ctx = document.getElementById('grafica3').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    responsive: true 
                }
            }]
        }
    }
});

//  ==========================================
//         grafica 4
//  ==========================================
var ctx = document.getElementById('grafica4').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    responsive: true 
                }
            }]
        }
    }
});
