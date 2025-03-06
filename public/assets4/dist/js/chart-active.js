"use strict";

// 1.0 => Area Chart 1

var areaChart1 = {
    chart: {
        height: 240,
        type: 'area',
        animations: {
            enabled: true,
            easing: 'easeinout',
            speed: 1000
        },
        dropShadow: {
            enabled: true,
            opacity: 0.1,
            blur: 1,
            left: -5,
            top: 18
        },
        zoom: {
            enabled: false
        },
        toolbar: {
            show: false
        },
    },
    colors: ['#0134d4', '#ea4c62'],
    dataLabels: {
        enabled: false
    },
    fill: {
        type: "gradient",
        gradient: {
            type: "vertical",
            shadeIntensity: 1,
            inverseColors: true,
            opacityFrom: 0.15,
            opacityTo: 0.02,
            stops: [40, 100],
        }
    },
    grid: {
        borderColor: '#dbeaea',
        strokeDashArray: 4,
        xaxis: {
            lines: {
                show: true
            }
        },
        yaxis: {
            lines: {
                show: false,
            }
        },
        padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
        },
    },
    legend: {
        position: 'bottom',
        horizontalAlign: 'center',
        offsetY: 4,
        fontSize: '14px',
        markers: {
            width: 9,
            height: 9,
            strokeWidth: 0,
            radius: 20
        },
        itemMargin: {
            horizontal: 5,
            vertical: 0
        }
    },
    title: {
        text: '$5,394',
        align: 'left',
        margin: 0,
        offsetX: 0,
        offsetY: 20,
        floating: false,
        style: {
            fontSize: '16px',
            color: '#8480ae'
        },
    },
    tooltip: {
        theme: 'dark',
        marker: {
            show: true,
        },
        x: {
            show: false,
        }
    },
    subtitle: {
        text: 'This week sales',
        align: 'left',
        margin: 0,
        offsetX: 0,
        offsetY: 0,
        floating: false,
        style: {
            fontSize: '14px',
            color: '#8480ae'
        }
    },
    stroke: {
        show: true,
        curve: 'smooth',
        width: 3
    },
    labels: ['S', 'S', 'M', 'T', 'W', 'T', 'F'],
    series: [{
        name: 'Affan',
        data: [320, 420, 395, 350, 410, 355, 360]
    }, {
        name: 'Suha',
        data: [400, 395, 350, 395, 430, 385, 374]
    }],
    xaxis: {
        crosshairs: {
            show: true
        },
        labels: {
            offsetX: 0,
            offsetY: 0,
            style: {
                colors: '#8480ae',
                fontSize: '12px',
            },
        },
        tooltip: {
            enabled: false,
        },
    },
    yaxis: {
        labels: {
            offsetX: -10,
            offsetY: 0,
            style: {
                colors: '#8480ae',
                fontSize: '12px',
            },
        }
    },
}

const areaCharts1 = document.getElementById('areaChart1');

if (areaCharts1) {
    var areaChart_01 = new ApexCharts(areaCharts1, areaChart1);
    areaChart_01.render();
}

// 2.0 => Area Chart 2

var areaChart2 = {
    chart: {
        height: 220,
        type: 'area',
        animations: {
            enabled: true,
            easing: 'easeinout',
            speed: 1000
        },
        dropShadow: {
            enabled: true,
            opacity: 0.1,
            blur: 1,
            left: -5,
            top: 5
        },
        zoom: {
            enabled: false
        },
        toolbar: {
            show: false
        },
    },
    colors: ['#0134d4'],
    dataLabels: {
        enabled: false
    },
    fill: {
        type: "gradient",
        gradient: {
            type: "vertical",
            shadeIntensity: 1,
            inverseColors: true,
            opacityFrom: 0.15,
            opacityTo: 0.05,
            stops: [40, 100],
        }
    },
    grid: {
        borderColor: '#dbeaea',
        strokeDashArray: 4,
        xaxis: {
            lines: {
                show: true
            }
        },
        yaxis: {
            lines: {
                show: false,
            }
        },
        padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
        },
    },
    legend: {
        position: 'top',
        horizontalAlign: 'right',
        offsetY: -60,
        fontSize: '14px',
        markers: {
            width: 9,
            height: 9,
            strokeWidth: 0,
            radius: 20
        },
        itemMargin: {
            horizontal: 5,
            vertical: 0
        }
    },
    title: {
        text: '',
        align: 'left',
        margin: 0,
        offsetX: 0,
        offsetY: 0,
        floating: true,
        style: {
            fontSize: '16px',
            color: '#8480ae'
        },
    },
    subtitle: {
        text: '',
        align: 'left',
        margin: 0,
        offsetX: 0,
        offsetY: 20,
        floating: true,
        style: {
            fontSize: '14px',
            color: '#8480ae'
        }
    },
    tooltip: {
        theme: 'dark',
        marker: {
            show: true,
        },
        x: {
            show: false,
        }
    },
    stroke: {
        show: true,
        curve: 'smooth',
        width: 3
    },
    labels: ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    series: [{
        name: 'Sales',
        data: [1420, 14602, 24741, 24119, 48224, 40635]
    }],
    xaxis: {
        crosshairs: {
            show: true
        },
        labels: {
            offsetX: 0,
            offsetY: 0,
            style: {
                colors: '#8480ae',
                fontSize: '12px',
            },
        },
        tooltip: {
            enabled: false,
        },
    },
    yaxis: {
        labels: {
            offsetX: -10,
            offsetY: 0,
            style: {
                colors: '#8480ae',
                fontSize: '12px',
            },
        }
    },
}

const areaCharts2 = document.getElementById('areaChart2');

if (areaCharts2) {
    var areaChart_02 = new ApexCharts(areaCharts2, areaChart2);
    areaChart_02.render();
}

// 3.0 => Column Chart 1

var columnChart1 = {
    chart: {
        height: 240,
        type: 'bar',
        animations: {
            enabled: true,
            easing: 'easeinout',
            speed: 1000
        },
        dropShadow: {
            enabled: true,
            opacity: 0.1,
            blur: 2,
            left: -1,
            top: 5
        },
        zoom: {
            enabled: false
        },
        toolbar: {
            show: false
        },
    },
    subtitle: {
        text: 'This week earnings',
        align: 'left',
        margin: 0,
        offsetX: 0,
        offsetY: 0,
        floating: false,
        style: {
            fontSize: '14px',
            color: '#8480ae'
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '60%',
            endingShape: 'rounded'
        },
    },
    colors: ['#0134d4', '#f1b10f'],
    dataLabels: {
        enabled: false
    },
    grid: {
        borderColor: '#dbeaea',
        strokeDashArray: 4,
        xaxis: {
            lines: {
                show: true
            }
        },
        yaxis: {
            lines: {
                show: false,
            }
        },
        padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
        },
    },
    legend: {
        position: 'bottom',
        horizontalAlign: 'center',
        offsetY: 6,
        fontSize: '12px',
        markers: {
            width: 10,
            height: 10,
            strokeWidth: 0,
            radius: 2
        },
        itemMargin: {
            horizontal: 5,
            vertical: 0
        }
    },
    tooltip: {
        theme: 'light',
        marker: {
            show: true,
        },
        x: {
            show: false,
        }
    },
    stroke: {
        show: true,
        colors: ['transparent'],
        width: 3
    },
    labels: ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
    series: [{
        name: 'Affan',
        data: [320, 420, 395, 350, 410, 355, 360]
    }, {
        name: 'Suha',
        data: [400, 395, 280, 520, 430, 385, 374]
    }],
    xaxis: {
        crosshairs: {
            show: true
        },
        labels: {
            offsetX: 0,
            offsetY: 0,
            style: {
                colors: '#8380ae',
                fontSize: '12px'
            },
        },
        tooltip: {
            enabled: false,
        },
    },
    yaxis: {
        labels: {
            formatter: function (value, index) {
                return (value / 1000) + 'k'
            },
            offsetX: -10,
            offsetY: 0,
            style: {
                colors: '#8380ae',
                fontSize: '12px'
            },
        }
    },
}

const columnCharts1 = document.getElementById('columnChart1');

if (columnCharts1) {
    var columnChart_01 = new ApexCharts(columnCharts1, columnChart1);
    columnChart_01.render();
}

// 4.0 => Column Chart 2

var columnChart2 = {
    chart: {
        height: 180,
        type: 'bar',
        animations: {
            enabled: true,
            easing: 'easeinout',
            speed: 1000
        },
        dropShadow: {
            enabled: true,
            opacity: 0.1,
            blur: 2,
            left: -1,
            top: 5
        },
        zoom: {
            enabled: false
        },
        toolbar: {
            show: false
        },
    },
    title: {
        text: '',
        align: 'left',
        margin: 0,
        offsetX: 0,
        offsetY: 0,
        floating: true,
        style: {
            fontSize: '14px',
            color: '#8480ae'
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '60%',
            endingShape: 'rounded'
        },
    },
    colors: ['#0134d4'],
    dataLabels: {
        enabled: false
    },
    grid: {
        borderColor: '#dbeaea',
        strokeDashArray: 4,
        xaxis: {
            lines: {
                show: true
            }
        },
        yaxis: {
            lines: {
                show: false,
            }
        },
        padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
        },
    },
    tooltip: {
        theme: 'dark',
        marker: {
            show: true,
        },
        x: {
            show: false,
        }
    },
    stroke: {
        show: true,
        colors: ['transparent'],
        width: 3
    },
    labels: ['01', '02', '03', '04', '05', '06', '07', '08'],
    series: [{
        name: 'Affan',
        data: [320, 420, 395, 350, 410, 355, 360, 420]
    }],
    xaxis: {
        crosshairs: {
            show: true
        },
        labels: {
            offsetX: 0,
            offsetY: 0,
            style: {
                colors: '#8380ae',
                fontSize: '10px'
            },
        },
        tooltip: {
            enabled: false,
        },
    },
    yaxis: {
        labels: {
            offsetX: -10,
            offsetY: 0,
            style: {
                colors: '#8380ae',
                fontSize: '10px'
            },
        }
    },
}

const columnCharts2 = document.getElementById('columnChart2');

if (columnCharts2) {
    var columnChart_02 = new ApexCharts(columnCharts2, columnChart2);
    columnChart_02.render();
}

// 5.0 => Line Chart 1

var lineChart1 = {
    chart: {
        height: 180,
        type: 'line',
        zoom: {
            enabled: false
        },
        toolbar: {
            show: false
        },
    },
    colors: ['#0134d4'],
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    title: {
        text: 'Last 6 month sales',
        align: 'center',
        margin: 0,
        offsetX: 0,
        offsetY: 0,
        floating: true,
        style: {
            fontSize: '14px',
            color: '#8480ae',
        }
    },
    tooltip: {
        theme: 'dark',
        marker: {
            show: true,
        },
        x: {
            show: false,
        }
    },
    grid: {
        borderColor: '#dbeaea',
        strokeDashArray: 4,
        xaxis: {
            lines: {
                show: true
            }
        },
        yaxis: {
            lines: {
                show: false,
            }
        },
        padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
        },
    },
    series: [{
        name: "Affan",
        data: [100, 401, 305, 501, 409, 602]
    }],
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        crosshairs: {
            show: true
        },
        labels: {
            offsetX: 0,
            offsetY: 0,
            style: {
                colors: '#8380ae',
                fontSize: '12px'
            },
        },
        tooltip: {
            enabled: false,
        },
    },
    yaxis: {
        labels: {
            offsetX: -10,
            offsetY: 0,
            style: {
                colors: '#8380ae',
                fontSize: '12px'
            },
        }
    }
};

const lineCharts1 = document.getElementById('lineChart1');

if (lineCharts1) {
    var lineChart_1 = new ApexCharts(lineCharts1, lineChart1);
    lineChart_1.render();
}

// 6.0 => Line Chart 2

var lineChart2 = {
    chart: {
        height: 160,
        type: 'line',
        zoom: {
            enabled: false
        },
        toolbar: {
            show: false
        },
    },
    colors: ['#2ecc4a'],
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    title: {
        text: '',
        align: 'center',
        margin: 0,
        offsetX: 0,
        offsetY: 0,
        floating: true,
        style: {
            fontSize: '14px',
            color: '#8480ae',
        }
    },
    tooltip: {
        theme: 'dark',
        marker: {
            show: true,
        },
        x: {
            show: false,
        }
    },
    grid: {
        borderColor: '#dbeaea',
        strokeDashArray: 4,
        xaxis: {
            lines: {
                show: true
            }
        },
        yaxis: {
            lines: {
                show: false,
            }
        },
        padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
        },
    },
    series: [{
        name: "Affan",
        data: [15, 18, 16, 17, 14, 13, 19]
    }],
    xaxis: {
        categories: ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
        crosshairs: {
            show: true
        },
        labels: {
            offsetX: 0,
            offsetY: 0,
            style: {
                colors: '#8380ae',
                fontSize: '12px'
            },
        },
        tooltip: {
            enabled: false,
        },
    },
    yaxis: {
        labels: {
            offsetX: -10,
            offsetY: 0,
            style: {
                colors: '#8380ae',
                fontSize: '12px'
            },
        }
    }
};

const lineCharts2 = document.getElementById('lineChart2');

if (lineCharts2) {
    var lineChart_2 = new ApexCharts(lineCharts2, lineChart2);
    lineChart_2.render();
}

// 7.0 => Pie Chart

var pieChart = {
    chart: {
        width: 280,
        type: 'pie',
        sparkline: {
            enabled: true
        },
        dropShadow: {
            enabled: false,
        },
    },
    colors: ['#0134d4', '#2ecc4a', '#ea4c62', '#1787b8'],
    series: [100, 55, 63, 77],
    labels: ['Business', 'Marketing', 'Admin', 'Ecommerce'],
};

const pieCharts = document.getElementById('pieChart');

if (pieCharts) {
    var pie_Chart = new ApexCharts(pieCharts, pieChart);
    pie_Chart.render();
}

// 8.0 => Donut Chart

var donutChart = {
    chart: {
        width: 280,
        type: 'donut',
        sparkline: {
            enabled: true
        },
        dropShadow: {
            enabled: false,
        },
    },
    colors: ['#0134d4', '#2ecc4a', '#ea4c62', '#1787b8'],
    series: [100, 55, 63, 77],
    labels: ['Business', 'Marketing', 'Admin', 'Ecommerce'],
};

const donutCharts = document.getElementById('donutChart');

if (donutCharts) {
    var donut_Chart = new ApexCharts(donutCharts, donutChart);
    donut_Chart.render();
}