const inputs = document.querySelectorAll('input');
console.log(inputs);
const emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

document.addEventListener('DOMContentLoaded', (e) => {
  inputs.forEach(input => {
    if(input.value != ""){
      input.parentNode.classList.add('animation');
    }else if(input.value == ""){
      input.parentNode.classList.remove('animation');
    }
  })
})
for (let i = 0; i < inputs.length; i++){
  let field = inputs[i];
  field.addEventListener('input', (e) => {
    if(e.target.value != ""){
      e.target.parentNode.classList.add('animation');
      console.log(emailRegex.test(e.target.value))
    }else if(e.target.value == ""){
      e.target.parentNode.classList.remove('animation');
      
    }
  })
}