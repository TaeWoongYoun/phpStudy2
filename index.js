var login = document.querySelector('.login');
var login_modal = document.querySelector('.login_modal');
var login_reset = document.querySelector('#login_reset');
var join = document.querySelector('.join');
var join_modal = document.querySelector('.join_modal');
var join_reset = document.querySelector('#join_reset');


function modalFunction(a,b,c){
    a.addEventListener('click', () =>{
        b.style.display = c;
    })  
}
modalFunction(login, login_modal ,'block');
modalFunction(login, join_modal, 'none')
modalFunction(login_reset, login_modal ,'none');
modalFunction(join, join_modal, 'block');
modalFunction(join, login_modal, 'none');
modalFunction(join_reset, join_modal, 'none');