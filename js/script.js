const projectContainers = [...document.querySelectorAll('.project-container')];
const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
const preBtn = [...document.querySelectorAll('.pre-btn')];

projectContainers.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    })

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    })
})

const anchors = document.querySelectorAll('a[href*="#"]')
for (let anchor of anchors) {
  anchor.addEventListener('click', function (e) {
    e.preventDefault()
    
    const blockID = anchor.getAttribute('href').substr(1)
    
    document.getElementById(blockID).scrollIntoView({
      behavior: 'smooth',
      block: 'start'
    })
  })
}

const openPopUp = document.getElementById('open_pop_up');
const closePopUp = document.getElementById('pop_up_close');
const popUp = document.getElementById('pop_up');

openPopUp.addEventListener('click', function(e) {
    e.preventDefault();
    popUp.classList.add('active');
})

closePopUp.addEventListener('click', () => {
    popUp.classList.remove('active');
})

const openPopUp2 = document.getElementById('open_pop_up2');
const closePopUp2 = document.getElementById('pop_up_close2');
const popUp2 = document.getElementById('pop_up2');

openPopUp2.addEventListener('click', function(e) {
    e.preventDefault();
    popUp2.classList.add('active');
})

closePopUp2.addEventListener('click', () => {
    popUp2.classList.remove('active');
})

const openPopUp3 = document.getElementById('open_pop_up3');
const closePopUp3 = document.getElementById('pop_up_close3');
const popUp3 = document.getElementById('pop_up3');

openPopUp3.addEventListener('click', function(e) {
    e.preventDefault();
    popUp3.classList.add('active');
})

closePopUp3.addEventListener('click', () => {
    popUp3.classList.remove('active');
})

const openPopUp4 = document.getElementById('open_pop_up4');
const closePopUp4 = document.getElementById('pop_up_close4');
const popUp4 = document.getElementById('pop_up4');

openPopUp4.addEventListener('click', function(e) {
    e.preventDefault();
    popUp4.classList.add('active');
})

closePopUp4.addEventListener('click', () => {
    popUp4.classList.remove('active');
})

const openPopUp5 = document.getElementById('open_pop_up5');
const closePopUp5 = document.getElementById('pop_up_close5');
const popUp5 = document.getElementById('pop_up5');

openPopUp5.addEventListener('click', function(e) {
    e.preventDefault();
    popUp5.classList.add('active');
})

closePopUp5.addEventListener('click', () => {
    popUp5.classList.remove('active');
})

const openPopUp6 = document.getElementById('js-btn-order');
const closePopUp6 = document.getElementById('pop_up_close6');
const popUp6 = document.getElementById('pop_up6');

openPopUp6.addEventListener('click', function(e) {
    e.preventDefault();
    popUp6.classList.add('active');
})

closePopUp6.addEventListener('click', () => {
    popUp6.classList.remove('active');
})

const openPopUp7 = document.getElementById('pr_obsl_btn_pp');
const closePopUp7 = document.getElementById('pop_up_close7');
const popUp7 = document.getElementById('pop_up7');

openPopUp7.addEventListener('click', function(e) {
    e.preventDefault();
    popUp7.classList.add('active');
})

closePopUp7.addEventListener('click', () => {
    popUp7.classList.remove('active');
})