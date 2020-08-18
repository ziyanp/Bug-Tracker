
$(document).ready(function(){
    $.ajax({
      url: "http://localhost/ticketSummary.php",
      method: "GET",
      success: function(data) {
        console.log(data);
        var pri = [];
        
  
        for(var i in data) {
          pri.push(data[i]);
          
        }

          var chartdata = {
            labels: ["Low", "Medium", "High"],
            datasets: [
                {
                 
                  backgroundColor: ['#ffff66', '#ffb366', '#ff6666'],
                  hoverBackgroundColor: ['#ffff66', '#ffb366', '#ff6666'],
                  hoverBorderColor: "rgba(234, 236, 244, 1)",
                  data: pri
                }
            ]
        };
    
          var ctx = $("#myPieChart");
    
          var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: chartdata,
            options: {
                maintainAspectRatio: false,
                tooltips: {
                  backgroundColor: "rgb(255,255,255)",
                  bodyFontColor: "#858796",
                  borderColor: '#dddfeb',
                  borderWidth: 1,
                  xPadding: 15,
                  yPadding: 15,
                  displayColors: false,
                  caretPadding: 10,
                },
                legend: {
                  display: false
                },
                cutoutPercentage: 80,
              }
          });
        },
        error: function(data) {
          console.log(data);
        }
      });
    });