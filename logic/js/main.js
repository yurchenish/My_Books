document.addEventListener('DOMContentLoaded', function(){
	
var mybooksSection =
document.querySelector('#mybooks-sec');
if(mybooksSection){
		mybooksSection.addEventListener('click', sectionHandler);

		function sectionHandler(event){
			// console.log(event.target);

			if(event.target.classList.contains('mybooks__reeded')){

					var btn = event.target;
					var mybooksId = btn.parentNode.getAttribute('data-mybooks-id');
					var reededCounter = document.querySelector('#reeded-count');
					var currentCount = reededCounter.textContent;

					doAjax({
						method: 'POST',
						url: 'logic/reeded_books.php',
						data: 'mybooks_id=' + mybooksId,
						contentType: 'application/x-www-form-urlencoded', 
						callback: function(){
							if(
							btn.classList.contains('mybooks__reeded_active') ){
								btn.textContent = '(Не читал)'; 
							 --currentCount;
							}else{
								btn.textContent	= '(Читал)';
								++currentCount;
							}

							btn.classList.toggle('mybooks__reeded_active');
							reededCounter.textContent = currentCount;

						}
					});

				}

   }

 	}



var moreBtn = document.querySelector('#showMore');
if(moreBtn){

		moreBtn.addEventListener('click', showMoreBooks);


	var lastShownBook = 0;

	function showMoreBooks(){
		lastShownBook++;

			doAjax({
				 method: 'POST',
				 url: 'logic/more_books.php',
				 data: 'last_shown_book=' + lastShownBook,
				 contentType: 'application/x-www-form-urlencoded',
				 callback: appendBooks
		 });

		 function appendBooks(mybooks){
		 	mybooks = JSON.parse(mybooks);

		 	if(mybooks){
		 		var name = document.createElement('h4');
		 		var link = document.createElement('a');
		 		link.href = 'logic/mybooks.php#reeded_' + mybooks.id;
		 		link.textContent	= mybooks.name

		 		name.appendChild(link);
		 		document.body.appendChild(name);
		 	}else{
		 		moreBtn.text.Content = 'Произведений больше нет';
		 		moreBtn.setAttribute('disabled', 'disabled');
		 	}

		 }

		}

	}

if(document.forms.newBooks){
	document.forms.newBooks.addEventListener('submit', addNewBooks);

	function addNewBooks(event){
		event.preventDefault();

		var formData = new FormData(this);

		doAjax({
			method: 'POST',
			url: 'logic/add_books.php',
			data: formData, 
			callback: function(response){
				alert(response);
			}
		});
	}
}

});