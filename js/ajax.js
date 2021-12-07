'use strict';

// *****************************************************************************
// AJAX CALLBACKS

// *********************************************
// update inputs from 1 book form
function ajaxShowUpdatedBook(data)
{
	// convert JSON to JS
    let datas = JSON.parse(data)    	
    
    for (let i = 0; i < datas.length ; i++)
    {
    	
    	document.querySelector(".updateBook[data-id='" + datas[i].id_book + "'] input:nth-child(2)").value = datas[i].title_book
		document.querySelector(".updateBook[data-id='" + datas[i].id_book + "'] img").setAttribute("src", "img/" + datas[i].image_book)
    }

}




// *********************************************
// create a link between title's book and bookDetails.phtml	
function showBook(book) 
    {
    
        let books = JSON.parse(book)
        
        document.getElementById("returnBook").innerHTML = ""
        
        books.map((book) => 
        {
            const newLi = document.createElement("li")
            newLi.classList.add("liSearchBar")
            
            const newA = document.createElement("a")
            newA.setAttribute("href", "index.php?a=bookDetails&idUser=2&idBook=" + book.id_book)
            newA.setAttribute("data-id", book.id_book)
            newA.textContent = book.title_book
            
            newLi.append(newA)
            document.getElementById("returnBook").append(newLi)
            
        })
    }