console.log(document.querySelector('.pageLinks'));
document.querySelector('.menuIcon').addEventListener('click', function() {
  const menu = document.querySelector('.pageLinks');
  console.log(menu);
  menu.style.display = (menu.style.display == 'block') ? "none" : "block";
})
