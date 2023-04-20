
// Prévisualisation de l'image téléchargée

function previewImage() {

	
	const inputs = document.querySelectorAll('.select_img');

	inputs.forEach(input => {
		input.addEventListener('change', function(){
			const file = input.files[0];
			const preview = input.parentNode.querySelector('.preview');

			if (file) {
				let reader = new FileReader();

				reader.onloadend = function() {
		           preview.setAttribute('src', reader.result);
		           preview.setAttribute('alt', file.name);
		        }
		        reader.readAsDataURL(file);
			}
			else {
				preview.setAttribute('src', "");
        		preview.setAttribute('alt', "");
			}
		}, false);
	});

}