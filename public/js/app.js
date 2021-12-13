// require('./bootstrap');

let subMenus = document.querySelectorAll('.sidebar__sub-menu');
function openSubMenu(subMenu, hasOpen) {

    let subMenuList = subMenu.querySelector('.sidebar__sub-menu-list');
    let subMenuItems = subMenuList.querySelectorAll('.sidebar__sub-menu-item');

    let active_height = subMenuItems[0].clientHeight * subMenuItems.length;

    if (hasOpen) {
        subMenuList.style.height = active_height + 'px';
    } else {
        subMenuList.style.height ='0';
    }
}
// Check activated menus to open their sub menus
window.onunload = function() {

}

subMenus.forEach(subMenu => {
    let hasOpen = subMenu.querySelector('.sidebar__menu-dropdown-icon').classList.contains('sidebar__menu-dropdown-icon--open');

    openSubMenu(subMenu, hasOpen);
});
// Click on menu item to open sub menu
subMenus.forEach((subMenu) => {
    subMenu.querySelector('.sidebar__menu-dropdown').onclick = (event) => {
        event.preventDefault();
        let hasOpen = subMenu.querySelector('.sidebar__menu-dropdown-icon').classList.toggle('sidebar__menu-dropdown-icon--open');

        openSubMenu(subMenu, hasOpen);
    }
});

// Active menu-item on sidebar
let menuItems = document.querySelectorAll('.sidebar__menu a');
menuItems.forEach((menuItem) => {

    menuItem.onclick = (event) => {
        // event.preventDefault();

        for (let item of menuItems) {
            item.parentElement.classList.remove('active');
        }

        event.target.parentElement.classList.add('active');
    }
});

// CATEGORY CHART
// let category_options = {
//     series: [44, 55, 13, 43],
//     chart: {
//         type: 'donut',
//     },
//     labels: ['Team A', 'Team B', 'Team C', 'Team D'],
//     colors: ['#6ab04c', '#2980b9', '#f39c12', '#d35400'],
//     // responsive: [{
//     //     breakpoint: 480,
//     //     options: {
//     //         chart: {
//     //             width: 200
//     //         },
//     //         legend: {
//     //             position: 'bottom'
//     //         }
//     //     }
//     // }]
// };

// let category_chart = new ApexCharts(document.querySelector("#category-chart"), category_options);
// category_chart.render();

// SALE CHART

function getLatestDates(number = 1) {
    let today = new Date();
    let day = today.getDate();
    let month = today.getMonth() + 1;
    let year = today.getFullYear();
    let stringDates = [];
    for (let i = number - 1; i >= 0; i--) {

        stringDates[i] = `${day}/${month}/${year}`;
        day -= 1;
    }
    return stringDates;
}

var sale_options = {
    series: [{
        name: 'Doanh thu',
        data: [200000, 400000, 300000, 700000, 1000000, 500000, 900000]
    }],
    chart: {
        type: 'bar',
        height: 350
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
        },
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: getLatestDates(7),
        labels: {
            style: {
                fontSize: '14px'
            }
        },
    },
    yaxis: {
        labels: {
            style: {
                fontSize: '14px'
            }
        },
        title: {
            text: 'VNĐ'
        }
    },
    fill: {
        opacity: 1
    },
    tooltip: {
        y: {
            formatter: function (val) {
                return val.toLocaleString("vi-VN", {
                    style: "currency",
                    currency: "VND"
                });
            }
        },
        style: {
            fontSize: '14px'
        }
    }
};

var sale_chart = new ApexCharts(document.querySelector("#sale-chart"), sale_options);
sale_chart.render();

// Darkmode for chart
// Biến theme trong parameter lấy từ template.blade
setDarkChart = (checkDark) => {
    let theme = {
        theme: {
            mode: checkDark ? 'dark' : 'light'
        }
    }
    sale_chart.updateOptions(theme);
    // category_chart.updateOptions(theme);
}

setDarkChart((theme == 'dark-mode') ? true : false);

// DARK MODE TOGGLE
let darkModeToggle = document.querySelector('#darkmode-toggle');

darkModeToggle.onclick = (event) => {
    event.preventDefault();

    let body = document.querySelector('body');
    // body.classList.toggle('dark-mode');

    let darkModeSwitch = darkModeToggle.querySelector('.sub-menu-link__darkmode-switch');
    // darkModeSwitch.classList.toggle('sub-menu-link__darkmode-switch--active');
    // setDarkChart(body.classList.contains('dark-mode'));

    if (body.classList.contains('dark-mode')) {
        body.classList.remove('dark-mode');
        darkModeSwitch.classList.remove('sub-menu-link__darkmode-switch--active');
        setCookie('theme', '');
        setDarkChart(false);

    }
    else {
        body.classList.add('dark-mode');
        darkModeSwitch.classList.add('sub-menu-link__darkmode-switch--active');
        setCookie('theme', 'dark-mode');
        setDarkChart(true);

    }
}

function setCookie(name, value) {
    var d = new Date();
    d.setTime(d.getTime() + (365*24*60*60*1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

// MENU SIDEBAR TOGGLE
let overlay = document.querySelector('.app__overlay');
let sidebar = document.querySelector('.sidebar');

function activeMenuSidebar() {
    sidebar.classList.toggle('active');
    overlay.classList.toggle('active');
}

overlay.onclick = () => {
    activeMenuSidebar();
}

document.querySelector('#mobile-menu-toggle').onclick = () => {
    activeMenuSidebar();
}

document.querySelector('#mobile-sidebar-close').onclick = () => {
    activeMenuSidebar();
}
