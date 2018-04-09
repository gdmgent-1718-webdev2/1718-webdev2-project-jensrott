$(function () {
  const classActive = 'nav__link--active';
  const $navLinks = $('.nav .nav__link:not(.nav__link--disabled)');
  $navLinks.on('click', function () {
    $navLinks.removeClass(classActive);
    $(this).addClass(classActive);
 })
});