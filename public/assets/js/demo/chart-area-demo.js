// Set new default font family and font color to mimic Bootstrap's default styling
// Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
// Chart.defaults.global.defaultFontColor = '#858796';
// var myLineChart;
function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

const btnBtn = document.querySelectorAll('.sort-link');
const selected = document.querySelector('.selected');
const pickDate = document.querySelector('#pick-date');
const checkBtn = document.querySelector('.checkBtn');
const checkForm = document.querySelector('.checkForm');
const dateFilter = document.querySelector('.dateFilter');
let myLineChart = 'j';
var data = [2,3,5];

pickDate.addEventListener('click', (event) => {
  dateFilter.style.display = 'block';
  // console.log(checkForm);
});

checkBtn.addEventListener('click', (event) => {

  event.preventDefault();
  let xhr = new XMLHttpRequest();
  url = '/sort-with-date';
  xhr.open('POST', url, true);

  xhr.addEventListener('readystatechange', () => {
    if(xhr.readyState === 4 && xhr.status == 200) {
      // data = [...JSON.parse(xhr.response)];
      console.log(xhr.response);
      // console.log(data);
    } 
  });
  let form = new FormData(checkForm);
  xhr.send(form);
});

btnBtn.forEach((b) => {
  if(b.classList.contains('pick-date')) {
  b.addEventListener('click', (event) => {
    // location.reload()
    
    dateFilter.style.display = 'none';
    selected.innerHTML = event.target.innerHTML;
    const url = event.target.dataset.link;

    let xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);

    xhr.addEventListener('readystatechange', () => {
      if(xhr.readyState === 4 && xhr.status == 200) {
        data = JSON.parse(xhr.response);
        // console.log(xhr.response);
        // console.log(data);
        display([Object.keys(data)], [Object.values(data)]);

      }
    });
    xhr.send();
  });
}});

// console.log([...Object.keys(data)])
// Area Chart Example



function display (data, values) {

  
  
  let lab = [];
  let val = [];


  for(let i = 0; i < data.length; i++) {
    lab.push(data[i]);
    val.push(values[i]);
  }
// console.log(myLineChart)
  
  var ctx = document.getElementById("myAreaChart");
  var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: lab[0],
    datasets: [{
      label: "Earnings",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: val[0],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
  
});

// console.log(myLineChart)



}
