

const tabs = document.querySelectorAll('[ role="tab"]')
const tabpanel = document.querySelectorAll('[role="tabpanel"]')

tabpanel.forEach((panel, index) => {
    if (index == 0) {
        console.log(panel);
    }
});

tabs.forEach((tab, index) => {
    if (index == 0) {
        tab.classList.add('active')
    }
    tab.addEventListener('click', () => {
        tabs.forEach(el => { el.classList.remove('active') })
        tab.classList.add('active')
        const activePanel = tab.getAttribute('href');
        tabpanel.forEach(panel => { panel.classList.add('d-none') })
        document.querySelector(activePanel).classList.remove('d-none')
    })
});