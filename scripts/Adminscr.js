const tabs = document.querySelectorAll('[data-tab-target]')
const tables = document.querySelectorAll('[data-table-target]')
const tabContents = document.querySelectorAll('[data-tab-content]')
const tabTables = document.querySelectorAll('[data-tab-table]')

tabs.forEach(tab => {
  tab.addEventListener('click', () => {
    const target = document.querySelector(tab.dataset.tabTarget)
    tabContents.forEach(tabContent => {
    tabContent.classList.remove('active')
    })
    tabs.forEach(tab => {
    tab.classList.remove('active')
    })
    tab.classList.add('active')
    target.classList.add('active')
  })
})

tables.forEach(table => {
  table.addEventListener('click', () => {
    const target = document.querySelector(table.dataset.tableTarget)
    tabTables.forEach(tabTable => {
    tabTable.classList.remove('active')
    })
    target.classList.add('active')
  })
})
