
const orderSubmit = document.querySelector('#place-order');
const selectCat = document.querySelector('.order-category');
const selectProd = document.querySelector('.prod_select');
const prodOrderForm = document.querySelector('#order_form');
const newCatNameForm = document.querySelector('#new_cat_name_form');
const orderErrors = document.querySelectorAll('.order_error');

const orderStatusBtn = document.querySelectorAll('.next_status');
const orderMessage = document.querySelector('#order-error');

// console.log(orderStatusBtn);

orderStatusBtn.forEach((btn) => {
    btn.addEventListener('click', (event) => {
        // event.preventDefault();

        let statusForm = new FormData();
        statusForm.append('order_id', btn.dataset.order_id);
        // console.log(btn.dataset.order_id);

        let xhr = new XMLHttpRequest();
        xhr.open('POST', '/admin/new-status', true);

        xhr.addEventListener('readystatechange', () => {
            if(xhr.readyState === 4) {
                console.log(xhr.response);
                orderMessage.style.display = 'block';
                let p = document.createElement('p');
                p.innerHTML = JSON.parse(xhr.response)['response'];
                orderMessage.append(p);
                setTimeout(() => {
                    location.reload()
                }, 2000);
            }
        });

        xhr.send(statusForm);
    });
  
});



const addGalleryImageBtn = document.querySelector('.gallery_submit');
const delGalleryImageBtn = document.querySelectorAll('.gallery_del');



delGalleryImageBtn.forEach((btn) => {

    btn.addEventListener('click', () => {
   
        let url = `/admin/remove-gallary?id=${btn.dataset.id}`;
        let xhr = new XMLHttpRequest();
        console.log(url);
        xhr.open('POST', url, true);
    
        xhr.addEventListener('readystatechange', () => {
            if(xhr.readyState === 4) {
                // console.log(xhr.response);
                handleResponse(JSON.parse(xhr.response));
            }
        });
    
        xhr.send();
    
        // console.log(thisform.action)
    });

})

if(addGalleryImageBtn) {
    addGalleryImageBtn.addEventListener('click', (e) => {
        e.preventDefault();
        const thisform = document.querySelector('#gallery-form');
        let form = new FormData(thisform);
    
        let xhr = new XMLHttpRequest();
        xhr.open('POST', thisform.action, true);
    
        xhr.addEventListener('readystatechange', () => {
            if(xhr.readyState === 4) {
                // console.log(JSON.parse(xhr.response));
                handleResponse(JSON.parse(xhr.response));
    
                window.location = '/admin/view-gallary';
    
            }
        });
    
        xhr.send(form);
    
        // console.log(thisform.action)
    });
    
}




if(selectCat) {
    selectCat.addEventListener('change', (event) => {
        selectProd.innerHTML = '';
        let cat_id = event.target.value;
    
        newCatNameForm.readOnly = (event.target.value) ? true : false;   
    
        let xhr = new XMLHttpRequest();
        xhr.open('GET', `/get-product?cat_id=${cat_id}`, true);
    
        xhr.addEventListener('readystatechange', () => {
            if(xhr.readyState === 4) {
                let thisResponse = JSON.parse(xhr.response)['response'];
                for(let i = 0; i < thisResponse.length; i++) {
                    let option = document.createElement('option');
                    option.value = thisResponse[i]['prod_id'];
                    option.innerHTML = thisResponse[i]['prod_title'];
                    selectProd.append(option);
    
                    selectProd.addEventListener('change', (e) => {
                        let currentItem = e.target.value;
                        for(let j = 0; j < thisResponse.length; j++) {
                            if(thisResponse[i]['prod_id'] == currentItem) {
                                document.querySelector('#prod_flavor').value = thisResponse[i]['prod_flavor'];
                                document.querySelector('#prod_steps').value = thisResponse[i]['prod_steps'];
                                document.querySelector('.prod_color').value = thisResponse[i]['prod_color'];
                            }
                               
                        }
                    });
                    document.querySelector('#prod_flavor').value = thisResponse[i]['prod_flavor'];
                    document.querySelector('#prod_steps').value = thisResponse[i]['prod_steps'];
                    document.querySelector('.prod_color').value = thisResponse[i]['prod_color'];   
                }
            }
        });
        xhr.send();
    });
}



if(orderSubmit) {
    orderSubmit.addEventListener('click', (event) => {

        event.preventDefault();
        orderErrors.forEach((orderError) => {
            orderError.textContent = orderError.innerHTML = '';
            // console.log(orderError)
        })
        const thisform = new FormData(prodOrderForm);
    
        const xhr = new XMLHttpRequest();
        xhr.open('POST', prodOrderForm.action, true);
    
        xhr.addEventListener('readystatechange', () => {
            if(xhr.readyState === 4) {
                console.log((xhr.response));
                // handleOrderResponse(JSON.parse(xhr.response));
            }
        });
        xhr.send(thisform);
    });
    
}



function handleOrderResponse(response) {

    if(!response['status']) {
        Object.entries(response['response']).forEach(([key, value]) => {

            let error = document.querySelector(`#${key}`);
            error.style.color = 'red';
            error.style.fontSize = '14px';
            error.textContent = (value instanceof Array) ? value[0] : value;
         });
    }
    else {
        const orderMessageContainer = document.querySelector('#order_message');
        const orderMessage = document.querySelector('#message');
        orderMessageContainer.style.display = 'block';
        orderMessage.innerHTML = response[0]['response'];

        setTimeout(() => {
            window.location = '/';
        }, 4000);
       
        // console.log(response);
    }

    // console.log(response['response']);
}


const contactForm = document.querySelector('#contact-form');
const cantactSubmit = document.querySelector('#contact-sub');

if(contactForm && cantactSubmit) {
    cantactSubmit.addEventListener('click', (e) => {
        e.preventDefault();
        const form = new FormData(contactForm);
        let url = form.action;

        let xhr = new XMLHttpRequest();
        xhr.open('POST', '/mail', true);

        xhr.addEventListener('readystatechange', () => {
            if(xhr.readyState === 4) {
                console.log(xhr.response);
            }
        });

        xhr.send(form);
    });
}

