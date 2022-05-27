let error = document.querySelector('#pd-error');

let allItems = document.querySelectorAll('.new_submit');
allItems.forEach(element => {
    element.addEventListener('click', handleForm('d_form'));
});

let errorHolder = document.querySelector('#d-error');


function handleForm(thisForm) {
    
    let form = document.querySelector(`#${thisForm}`);
    console.log(form)
    let url = $(form).attr('action');
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        if(confirm('Confirm this Operation?') == true) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', url, true);
            xhr.addEventListener('readystatechange', () => {
                if(xhr.readyState == 4) {
                    // console.log(JSON.parse(xhr.response))
                    handleResponse(JSON.parse(xhr.response))
                }
            });

            var formdata = new FormData(form);
            xhr.send(formdata);
        }
    });
}

let prodSubmitBtn = document.querySelector('.product_submit');
if(prodSubmitBtn !=null) {
    prodSubmitBtn.addEventListener('click', handleProduct('prod_form'));
}

function handleProduct(thisForm) {   
    let form = document.querySelector(`#${thisForm}`);

    let url = $(form).attr('action');
    form.addEventListener('submit', (e) => {
        document.querySelectorAll('.prod_error1').forEach((item) => item.textContent =  item.innerHTML ='');
        e.preventDefault();
        if(confirm('Confirm this Operation?') == true) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', url, true);
            xhr.addEventListener('readystatechange', () => {
                if(xhr.readyState == 4) {
                //    console.log(xhr.response)
                handleProductResponse(JSON.parse(xhr.response))
                }
            });

            var formdata = new FormData(form);
            formdata.append('prod_id', prodSubmitBtn.dataset.prod_id)
            xhr.send(formdata);
        }
    });
}

function handleProductResponse(data) {
    if(!data['status']) {
        Object.entries(data['response']).forEach(([key, value]) => {
            // console.log(document.querySelector(key`))
            document.querySelector(`#${key}`).textContent = value;
        });
    }
    else {

        handleProductResponses(data);
    }
}

function handleProductResponses(response) {

    if(response['status'] == true) {
        error.style.display = 'block';
        error.style.color = 'green';
        error.classList.add('success')
        error.append(createMessage(response['response'], 'white'));
        setTimeout(() => {
            location.reload()
        }, 4000);
    }
    else {

        error.style.display = 'block';
        error.style.color = 'red';
        error.classList.add('error')
        error.append(createMessage(response['message'], 'red'));
        setTimeout(() => {
            location.reload()
        }, 4000);

    }
}

function createMessage(message, colo) {
    let p = document.createElement('p');
    p.textContent = message;
    p.style.color =colo;
    p.style.fontSize = '14px'
    p.style.fontWeight = 600;

    return p;
    
}
     






