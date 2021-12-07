'use strict';

// *****************************************************************************
// EVENT MANAGER

// *****************************************************************************
// ADD BOOK IN DATABASE
function onSubmitAddBook(e)
{
    // stop propagation
    e.preventDefault()
    
    // ajax request
    $.ajax({
        type: 'POST',
        url: 'addBook.php',
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData:false,
        success: function(response)
        {
            // create p for each error
            if(response.status === 0)
            {
                document.getElementById("return").innerHTML = ""
                let messagesArray = response['message']
                for(let i = 0 ; i < messagesArray.length; i++)
                {
                    const newP = document.createElement("p")
                    newP.textContent = response['message'][i]
                    newP.classList.add("errorMessage")
                    document.getElementById("return").append(newP)
                    
                    console.log("erreur")
                }
            }
            // get the new book by title
            else if(response.status === 1)
            {
                document.getElementById("return").innerHTML = ""
                const newP = document.createElement("p")
                newP.textContent = "Livre enregistré avec succès !"
                newP.classList.add("validMessage")
                document.getElementById("return").append(newP)
                
                console.log("valid")
            }
            // error in code
            else
            {
                console.log("erreur de code")
            }
        }
    })
}


// *****************************************************************************
// UPDATE BOOK IN DATABASE
function onSubmitUpdateBook(e)
{
    // stop propagation
    e.preventDefault()
    
    // ajax request
    $.ajax({
        type: 'POST',   
        url: 'updateBook.php',
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData:false,
        success: function(response)
        {
            // create p for each error
            if(response.status === 0)
            {
                document.getElementById("result").innerHTML = ""
                let messagesArray = response['message']
                for(let i = 0 ; i < messagesArray.length; i++)
                {
                    const newP = document.createElement("p")
                    newP.textContent = response['message'][i]
                    newP.classList.add("errorMessage")
                    document.getElementById("result").append(newP)
                }
            }
            // if no error
            else if(response.status === 1)
            {
                document.getElementById("result").innerHTML = ""
                // send id book
                getOneBookById(response['message'])
            }
            // error in code
            else
            {
                console.log("erreur de code")
            }
        }
    })
}


// *****************************************************************************
// GET 1 BOOK BY ID FROM DATABASE
function getOneBookById(id)
{
    // ajax request
    $.post
    (
        "getNewBook.php",
        {id :id},
        function(data) 
        {
            ajaxShowUpdatedBook(data)
        }
    ) 
}


// *****************************************************************************
// RESERVE 1 BOOK  
function onSubmitReserveBook(e)
{
    // stop propagation
    e.preventDefault()
    
    // ajax request
    $.ajax({
        type: 'POST',   
        url: 'reserveBook.php',
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData:false,
        success: function(response)
        {
            // console.log(response)
            
            // create p for each error
            if(response.status === 0)
            {
                document.getElementById("return").innerHTML = ""
                let messagesArray = response['message']
                for(let i = 0 ; i < messagesArray.length; i++)
                {
                    const newP = document.createElement("p")
                    newP.textContent = response['message'][i]
                    newP.classList.add("errorMessage")
                    document.getElementById("return").append(newP)
                }
            }
            // if no error
            else if(response.status === 1)
            {
                document.getElementById("return").innerHTML = '<p class="validMessage">' + response["message"] + '</p>'
                
            }
            // error in code
            else
            {
                console.log("erreur de code")
            }
        }
    })
}


// *********************************************
// DELETE BOOK IN DATABASE
function onClickDeleteBook()
{
    const id = this.dataset.id
    
    // ajax request
    $.get
    (
        "deleteBook.php",
        {id: id}
    )
}


// *********************************************
// LIVE BAR
function onKeyUpSearchBook()
{
    // input's value
    const title = document.getElementById("searchBook").value
    
    // ajax request
    $.post  
    (
        "searchBar.php",
        {title :title},
        showBook
    ) 
}


// *********************************************
// HISTORY  BACK
function historyBack()
{
    window.history.back()
}


// *********************************************
// REGISTRATION
function onSubmitRegisterUser(e)
{
    // stop propagation
    e.preventDefault()
    
    // ajax request
    $.ajax({
        type: 'POST',
        url: 'register.php',
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData:false,
        success: function(response)
        {
            // create p for each error
            if(response.status === 0)
            {
                document.getElementById("return").innerHTML = ""
                let messagesArray = response['message']
                for(let i = 0 ; i < messagesArray.length; i++)
                {
                    const newP = document.createElement("p")
                    newP.textContent = response['message'][i]
                    newP.classList.add("errorMessage")
                    document.getElementById("return").append(newP)
                }
            }
            // valid registration
            else if(response.status === 1)
            {
                document.getElementById("return").innerHTML = "<p class='validMessage'>Compte enregistré avec succès !</p>"
                
                document.querySelector(".register form").style.display = "none";
                
                const newA = document.createElement("a")
                newA.textContent = "Aller à l'accueil"
                newA.setAttribute("href", "https://tudel.sites.3wa.io/librairie2/index.php")
                document.getElementById("return").append(newA)
            }
        }
    })  
}


// *********************************************
// LOGIN
function onSubmitLoginUser(e)
{
    // stop propagation
    e.preventDefault()
    
    //ajax request
    $.ajax({
        type: 'POST',
        url: 'login.php',
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData:false,
        success: function(response)
        {
            // error
            if(response.status === 0)
            {
                document.getElementById("return").innerHTML = "<p class='errorMessage'>" + response['message'] + "</p>"
            }
            // no error
            else
            {
                window.location.href = "https://tudel.sites.3wa.io/librairie2/index.php"
            }
        }
    })  
}


// *********************************************
// USER PREFERENCES - SEND POST
function onSubmitSendPost(e)
    {
        // stop propagation
        e.preventDefault()
        
        // ajax request
        $.ajax({
            type: 'POST',
            url: 'sendPost.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            success: function(response)
            {
                // create p for each error
                if(response.status === 0)
                {
                    document.getElementById("return").innerHTML = ""
                    let messagesArray = response['message']
                    for(let i = 0 ; i < messagesArray.length; i++)
                    {
                        const newP = document.createElement("p")
                        newP.textContent = response['message'][i]
                        newP.classList.add("errorMessage")
                        document.getElementById("return").append(newP)
                    }
                }
                // no error
                else if(response.status === 1)
                {
                    document.getElementById("return").innerHTML = "<p class='validMessage'>Message envoyé avec succès !</p>"
                    document.getElementById("content_post").value = ""
                }
            }
        })  
    }


// *********************************************
// USER PREFERENCES - SHOW MODAL
function showModal()
{
    document.querySelector(".modal").style.display = "block"
}


// *********************************************
// USER PREFERENCES - CLOSE MODAL
function closeModal()
{
    document.querySelector(".modal").style.display = "none"
}


// *********************************************
// USER PREFERENCES - STYLE CHOICE  
function styleChoice()
{
    saveDataInLS("styleChoice", this.textContent)
    closeModal()
    location.reload()
}