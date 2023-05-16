// Выпадающее меню
$('body').on('click', '.main__question--item', (e) => {
    // Прячем все уже открытые пункты, если таковые имееются, кроме того, по которому произошел клик
    $('.question__text').not($(e.target).closest('.main__question--item').find('.question__text')).fadeOut(300);
    $('.question__arrow').not($(e.target).closest('.main__question--item').find('.question__arrow')).removeClass('open');

    // Показываем пункт, по которому кликнули
    $(e.target).closest('.main__question--item').find('.question__text').fadeToggle(300);
    $(e.target).closest('.main__question--item').find('.question__arrow').toggleClass('open');
});