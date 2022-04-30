const pages = Array.from(document.querySelectorAll('form .sondage-page'));
const nextBtn = document.querySelectorAll('form .btnNext');
const prevBtn = document.querySelectorAll('form .btnPrev');

nextBtn.forEach(button => {
  button.addEventListener('click', () => {
      changePage('next');
  })
});
prevBtn.forEach( button => {
  button.addEventListener('click', () => {
      changePage('prev');
  })
})
function changePage(btn){
  let index = 0;
  const active = document.querySelector('.active');
  index = pages.indexOf(active);
  pages[index].classList.remove('active');
  if(btn === 'next'){
      index++;
  }else if(btn === 'prev'){
      index --;
  }
  pages[index].classList.add('active');
}