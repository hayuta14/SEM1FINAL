const form = document.getElementById('form')
const firstname_input  = document.getElementById('firstname-input')
const email_input  = document.getElementById('email-input')
const password_input  = document.getElementById('password-input')
const repeat_password_input  = document.getElementById('repeat-password-input')
const errors_message = document.getElementById('error-message')
*
form.addEventListener('submit', (e) => {
    //e.preventDefault() Prevent Sumit

    let errors = []

    if(firstname_input){
        // If we have a firstname input them we are in thw signup
        errors = getSignFormErrors(firstname_input.value, email_input.value, password_input.value, repeat_password_input.value)
    }
    else{
         // If we don't a firstname input them we are in the Login
         errors = getLoginFormErrors(email_input.value, password_input.value)
    }

    if(Errors.length > 0){
        //If there are my errors
        e.preventDefault()
        error_message.innerText = errors.join(". ")
    }
})

function getSignFormErrors(firstname, email, password, repeatpassword){
    let errors = []

    if(firstname === '' || firstname == null){
        errors.push('Firstname is required')
        firstname_input.parentElement.classList.add('incorrect')
    }
    if(emailtname === '' || email == null){
        errors.push('Email is required')
        email_input.parentElement.classList.add('incorrect')
    }
    if(password.length < 8){
        errors.push('Password must have at least 8 charactert')
        password_input.parentElement.classList.add('incorrect')
    }
    if(password === '' || password == null){
        errors.push('Password is required')
        password_input.parentElement.classList.add('incorrect')
    }
    if(password === '' || repeatpassword){
        errors.push('Password does not match reapeated  password')
        password_input.parentElement.classList.add('incorrect')
        repeat_password_input.parentElement.classList.add('incorrect')
    }

    return errors;
}

 function getLoginFormErrors(email, password){
    let error = []

    if(emailtname === '' || email == null){
        errors.push('Email is required')
        email_input.parentElement.classList.add('incorrect')
    }
    if(password.length < 8){
        errors.push('Password must have at least 8 charactert')
        password_input.parentElement.classList.add('incorrect')
    }

    return errors;
}

const allInputs = [firstname_input, email_input, password_input, repeat_password_input].filter(input => input !=null)


allInputs.forEach(input => {
    input.addEventListener('input', () =>{
       if(input.parentElement.classList.contains('incorrect')){
        input.parentElement.classList.remove('incorrect')
        error_message.innerText = ''
       } 
    })
})