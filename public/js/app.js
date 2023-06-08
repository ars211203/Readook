const hamburger = document.querySelector('.header .nav-bar .nav-list .hamburger');
const mobile_menu = document.querySelector('.header .nav-bar .nav-list ul');
const menu_item = document.querySelectorAll('.header .nav-bar .nav-list ul li a');
const header = document.querySelector('.header.container');

hamburger.addEventListener('click', () => {
	hamburger.classList.toggle('active');
	mobile_menu.classList.toggle('active');
});

document.addEventListener('scroll', () => {
	var scroll_position = window.scrollY;
	if (scroll_position > 250) {
		header.style.backgroundColor = '#29323c';
	} else {
		header.style.backgroundColor = 'transparent';
	}
});

menu_item.forEach((item) => {
	item.addEventListener('click', () => {
		hamburger.classList.toggle('active');
		mobile_menu.classList.toggle('active');
	});
});
// Lấy thẻ <a> có đường dẫn đăng nhập
const loginLink = document.querySelector('a[href="login.html"]');

// Thêm sự kiện lắng nghe cho đường dẫn đăng nhập
loginLink.addEventListener('click', () => {
  // Sau khi đăng nhập thành công, ẩn thẻ <li> chứa đường dẫn đăng nhập
  loginLink.parentNode.style.display = 'none';
});