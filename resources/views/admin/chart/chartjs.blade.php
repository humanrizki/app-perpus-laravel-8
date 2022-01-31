{{-- @extends('admin.layouts.app') --}}
{{-- @section('content') --}}
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class="w-4/5 mx-auto p-2 bg-white">
            <canvas id="myChart"></canvas>
            <p class="my-2 ml-2 font-medium text-gray-700">Klik untuk mengetahui data terbaru!</p>
            <button id="button" type="button" class="p-2 rounded text-center text-white font-medium shadow bg-green-500 hover:bg-green-600 hover:shadow-md w-full my-2">Klik</button>
        </div>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            document.addEventListener('DOMContentLoaded',function(event){
                let url = "{{ url('/dashboard/chartjs') }}";
                let Departments = ["Rekayasa perangkat lunak 1", "Rekayasa perangkat lunak 2"];
                let Data = [5,2];
                
                
                const data = {
                    labels: Departments,
                    datasets: [{
                        label: 'My First dataset',
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(75, 192, 192)',
                            'rgb(255, 205, 86)',
                            'rgb(201, 203, 207)',
                            'rgb(54, 162, 235)'
                        ],
                        borderColor: 'rgb(0, 0, 0)',
                        data: Data,
                    }]
                };
                const config = {
                    type: 'pie',
                    data: data,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                };
                const myChart = new Chart(
                    document.getElementById('myChart'),
                    config
                );
                async function fetchData(){
                    const response = await fetch(url, {
                        method:"GET"
                        }).then((response)=> response.json())
                        .then(function(data){
                            const newDepartments = [];
                            const newData = [];
                            const newBg = [];
                            data.departments.forEach((value)=>{
                                newDepartments.push(value.toString());
                            });
                            data.values.forEach((value)=>{
                                newData.push(value.toString());
                            });
                            console.info(data.backgroundColor);
                            data.backgroundColor.forEach((value)=>{
                                newBg.push(value.toString());
                            })
                            myChart.config.data.labels = newDepartments;
                            console.info(myChart.config.data.labels);
                            myChart.data.datasets[0].data = newData;
                            myChart.data.datasets[0].backgroundColor = newBg;
                            console.info(newBg);
                            console.info(myChart.data.datasets[0].backgroundColor);
                            myChart.update();
                    });
                    return response;
                }
                document.getElementById('button').addEventListener('click',function(){
                    fetchData()
                })  
            });
                
    
        </script>
    </body>
    </html>
    
{{-- @endsection --}}
