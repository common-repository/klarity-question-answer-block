function toggleExpandAnswer(elem) {
  const answer = jQuery(elem).parent().find('.answer-container');
  if(answer.hasClass('collapsed')) { // if collapse all before toggle answer
    jQuery('.answer-container').removeClass('expanded').addClass('collapsed')
  }
  answer.toggleClass('collapsed expanded');

  const chevron = jQuery(elem).find('.chevron-container');
  if(chevron.hasClass('chevron-down')) {
    jQuery('.chevron-container').removeClass('chevron-up').addClass('chevron-down')
  }
  chevron.toggleClass('chevron-up chevron-down')
}
