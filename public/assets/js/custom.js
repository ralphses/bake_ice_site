let allBtn = document.querySelectorAll('.fdelete-cat-btn');
let cat_error = document.querySelector('#allcat-error');
let publishBtn = document.querySelectorAll('.fpublish');
let pDelete = document.querySelectorAll('.pdelete-btn');

let products =[];


allBtn.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        e.preventDefault()
        if(confirm('Confirm this operation') == true) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST',`/admin/delete`, true);
            xhr.addEventListener('readystatechange', () => {
                if(xhr.readyState == 4) {
                    // console.log(xhr.response);
                    handleResponse(JSON.parse(xhr.response));
                }
            })
            var fo = new FormData();
            fo.append('id', btn.dataset.id);
            xhr.send(fo)
        }
       
    })
})

pDelete.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        e.preventDefault()
        if(confirm('Confirm this operation') == true) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST',`/admin/delete-product`, true);
            xhr.addEventListener('readystatechange', () => {
                if(xhr.readyState == 4) {
                     handleResponse(JSON.parse(xhr.response));
                    // console.log(xhr.response)
                }
            })
            var fo = new FormData();
            fo.append('prod_id', btn.dataset.prod_id);
            xhr.send(fo)
        }
    })
})

publishBtn.forEach((btn) => {

    btn.addEventListener('click', (e) => {
        e.preventDefault()
        if(confirm('Confirm this operation') == true) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST',`/admin/publish`, true);
            xhr.addEventListener('readystatechange', () => {
                if(xhr.readyState == 4) {
                    handleResponse(JSON.parse(xhr.response));
                    // console.log(xhr.response)
                }
            })
            var fo = new FormData();
            fo.append('prod_id', btn.dataset.prod_id);
            fo.append('action', btn.dataset.action);
            xhr.send(fo)
        }
       
    })

})

//For customer form
const customerFormArea = document.querySelector('#customer-form-area');
const customerForm = document.querySelector('#customer-form');
const orderFormArea = document.querySelector('#order_form-area');
const orderForm = document.querySelector('#order_form');
const customerSubmit = document.querySelector('#customer-submit');
const errorp = document.querySelectorAll('.cust_error');

if(customerSubmit) {
    customerSubmit.addEventListener('click', (e) => {
        e.preventDefault();
        errorp.forEach((er) => er.textContent = er.innerHTML = '');
    
        let url = $(customerForm).attr('action');
        let xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.addEventListener('readystatechange', () =>{
            if(xhr.readyState === 4) {
                console.log(xhr.response);
                if(JSON.parse(xhr.response)['status'] == true) {
                    products = JSON.parse(xhr.response);
                    if(customerSubmit.dataset.prod_id != '') {
                        window.location.href = `/order?prod_id=${customerSubmit.dataset.prod_id}&prod_qty=${customerSubmit.dataset.qty}&customer_id=${products['response']['customer_id']}`;
                    }
                    else {
                        window.location.href = `/order?customer_id=${products['response']['customer_id']}`;
                    }
                  
                    // showOrderForm();
                    // console.log(products['response']);
                }
                else {
                    handleCustomerResponse(JSON.parse(xhr.response));
                }
            }
        });
        let customerDetails = new FormData(customerForm);
        xhr.send(customerDetails);
    });
    
}



function handleCustomerResponse(response) {

    Object.entries(response['response']).forEach(([key, value]) => {

       let error = document.querySelector(`#${key}`);
       error.style.color = 'red';
       error.style.fontSize = '14px';
       error.textContent = value[0];
        
    });
        
   
    // console.log(response['response']);
}

function handleResponse(response) {

    if(response['status'] == true) {
        cat_error.style.display = 'block';
        cat_error.style.color = 'green';
        cat_error.classList.add('success')
        cat_error.append(createMessage(response['message'], 'white'));
        setTimeout(() => {
            location.reload()
        }, 2000);
    }
    else {

        cat_error.style.display = 'block';
        cat_error.style.color = 'red';
        cat_error.classList.add('error')
        cat_error.append(createMessage(response['message'], 'red'));
        setTimeout(() => {
            location.reload()
        }, 2000);

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
     