
//nếu tồn tại menu menu mobile thì thực hiện
if (document.querySelector('#list-menu')) {
  document.addEventListener('click', function (event) {
    const listMenu = document.querySelector('#list-menu');
    const menuMobile_btn = document.querySelector('#menu-mobile-btn');
    if (menuMobile_btn.contains(event.target)) {
      //  Click menu mobile button
      listMenu.classList.toggle('hidden');
      listMenu.classList.toggle('list-menu-mobile');
    } else {
      //  Click outside menu mobile button
      if (!listMenu.classList.contains('hidden')) { //Nếu menu mobile đang mở
        listMenu.classList.add('hidden'); //Đóng menu mobile
        listMenu.classList.add('animate-up');
        listMenu.classList.remove('list-menu-mobile'); //Đóng menu mobile
      }
    }
  });
}

const boxUserDrop = document.querySelector('.user__box__drop-dow');
if (boxUserDrop) {
  function boxUser() { //Hàm hiện thị box user
    boxUserDrop.classList.toggle('hidden');
  }
}
const writeComment = document.querySelector('.write-comments');// Lấy thẻ div chứa form comment
if (writeComment) {
  function toggleComment() {
    writeComment.classList.toggle('hidden'); //Ẩn hiện form comment
  }
}




var checkAll = document.querySelector('#checkAll');
var checkboxes = document.querySelectorAll('.checkbox');
var selected = document.querySelector('#select');
var unselected = document.querySelector('#unselect');
if (checkAll) {
  selected.addEventListener('click', function () {
    checkAll.checked = true;
    checkboxes.forEach(function (checkbox) {
      checkbox.checked = true;
    })
  })
}
if (unselected) {
  unselected.addEventListener('click', function () {
    unselected.checked = false;
    checkboxes.forEach(function (checkbox) {
      checkbox.checked = false;
    })
  })
}
 unselected.addEventListener('click', function () {
   checkAll.checked = false;
   checkboxes.forEach(function (checkbox) {
     checkbox.checked = false;
   })
 })
