const navItemsLi = document.querySelectorAll('.nav__items > li');
const nav__profile = document.querySelector('.nav__profile');
const openNavBtn = document.querySelector('.open__nav-btn');
const closenavBtn = document.querySelector('.close__nav-btn');

function openNav() {
    for (let li of navItemsLi) li.style.display = 'flex';
    openNavBtn.style.display = 'none';
    closenavBtn.style.display = 'inline-block';
}

function closeNav() {
    for (let li of navItemsLi) li.style.display = 'none';
    nav__profile.style.display = 'flex';
    openNavBtn.style.display = 'inline-block';
    closenavBtn.style.display = 'none';
}

openNavBtn.addEventListener('click', openNav);
closenavBtn.addEventListener('click', closeNav);



const sidebar = document.querySelector('aside');
const showSidebarBtn = document.querySelector('#show__sidebar-btn');
const hideSidebarBtn = document.querySelector('#hide__sidebar-btn');

function showSidebar() {
    sidebar.style.left = '0';
    showSidebarBtn.style.display = 'none';
    hideSidebarBtn.style.display = 'grid';
}

function hideSidebar() {
    sidebar.style.left = '-100%';
    showSidebarBtn.style.display = 'grid';
    hideSidebarBtn.style.display = 'none';
}

showSidebarBtn.addEventListener('click', showSidebar);
hideSidebarBtn.addEventListener('click', hideSidebar);