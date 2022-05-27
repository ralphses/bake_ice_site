/* All Variables from this admin*/
const errors = document.querySelector('.errors');


//Adding all eventlisteners
document.querySelector('#new_cat_submit').addEventListener('click', addNewCategory);


//Function to add new Category

function addNewCategory(){
	clearError();
	request('../../../start.php', '#newCatForm', (response) => {
		if(!response.length == 0) {
			
			response = JSON.parse(response);
			response.forEach((item) => addError(item));
			showError();
		}
		else {
			showSuccess('New Category Added Successfully!');
		}
		
	});


}

function showSuccess(message) {
	alert(message);
}

function addError(error) {
	let err = document.createElement('p');
    err.textContent = error;
   errors.append(err);
}

function clearError() {
	errors.innerHTML ='';
}

function showError() {
	errors.style.display = 'block';
}

function request(url, data, callback) {
	
	var xhr = new XMLHttpRequest();
	xhr.open('POST', url, true);
	xhr.addEventListener('readystatechange', function() {
		if(xhr.readyState === 4) {
			if(callback) {
				callback(xhr.response);
			}
		}
	});

	var formdata = data ? (data instanceof FormData ? data : new FormData(document.querySelector(data))) : new FormData();
	xhr.send(formdata);
}


