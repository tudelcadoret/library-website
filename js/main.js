'use strict';


// *****************************************************************************
// MAIN CODE
    
document.addEventListener(  'DOMContentLoaded', function () {
    
    
    // *************************************************************************
    // *************************************************************************
    // APPLY USER PREFERENCES
    if(document.body)
    {
        let choice = getDataFromLS("styleChoice")
        
        if( choice === "Rétro")
        {
            document.body.style.background = "#F8F8FF"
            const arrayTitles = document.querySelectorAll("h1, h2, h3")
            for ( let i=0 ; i < arrayTitles.length ; i++)
            {
                arrayTitles[i].style.fontFamily = "IBM Plex Mono"
                arrayTitles[i].style.color = "#666"
            }
        }
    }
    
    
    // *************************************************************************
    // *************************************************************************
    // ACTIVED HEADER NAV A
    switch(window.location.href)
    {
        case "https://tudel.sites.3wa.io/librairie2/index.php" :
            document.querySelector("header nav a:nth-child(1)").classList.toggle("isSelected")
            break;
            
        case "https://tudel.sites.3wa.io/librairie2/index.php?a=showAllBooks" :
            document.querySelector("header nav a:nth-child(2)").classList.toggle("isSelected")
            break;
            
        case "https://tudel.sites.3wa.io/librairie2/index.php?a=contact" :
            document.querySelector("header nav a:nth-child(3)").classList.toggle("isSelected")
            break;
            
        case "https://tudel.sites.3wa.io/librairie2/index.php?a=" :
            document.querySelector("header nav a:nth-child(4)").classList.toggle("isSelected")
            break;
            
        case "https://tudel.sites.3wa.io/librairie2/index.php?a=register" :
            document.querySelector("header nav a:nth-child(5)").classList.toggle("isSelected")
            break;
            
        case "https://tudel.sites.3wa.io/librairie2/admin.php" :
            document.querySelector("header nav a:nth-child(5)").classList.toggle("isSelected")
            break;
            
        default :
            break;
    }
    
    
    // *************************************************************************
    // *************************************************************************
    // CLICK EVENTS
    
    
    // *********************************************
    // DELETE BOOK
    const deleteBook = document.querySelectorAll(".deleteBook")
    for(let i=0; i<deleteBook.length; i++)
    {
        deleteBook[i].addEventListener("click", onClickDeleteBook)
    }
    

    // *********************************************
    // HISTORY BACK
    if(document.getElementById("historyBack"))
    {
        document.getElementById("historyBack").addEventListener("click", historyBack)
    }
    
    
    // *********************************************
    // USER PREFERENCES - SHOW MODAL
    if(document.getElementById("showModal"))
    {
        document.getElementById("showModal").addEventListener("click", showModal)
    }
    
    
    // *********************************************
    // USER PREFERENCES - STYLE CHOICE
    if(document.querySelectorAll(".styleChoice"))
    {
        const arrayChoice = document.querySelectorAll(".styleChoice")
        for( let i=0 ; i < arrayChoice.length ; i++)
        {
            arrayChoice[i].addEventListener("click", styleChoice)
        }
    }
    
    
    // *********************************************
    // HIDDEN BLOCKS
    if(document.querySelector(".actionDisplay"))
    {
        const arrayDisplay = document.querySelectorAll(".actionDisplay")
        for(let i=0 ; i < arrayDisplay.length ; i++)
        {
            arrayDisplay[i].addEventListener("click", function(){
                // toggle display for search bar display
                if(arrayDisplay[i].classList.contains("fa-search"))
                {
                    document.getElementById("articleSearchBar").classList.toggle("fadeIn")
                    document.getElementById("articleSearchBar").classList.toggle("hiddenBlock")
                }
                // toggle display for addBook form
                else if(arrayDisplay[i].classList.contains("fa-plus-square"))
                {
                    document.getElementById("articleAddBook").classList.toggle("fadeIn")
                    document.getElementById("articleAddBook").classList.toggle("hiddenBlock")
                }
            })
        }
    }
    
    
    
    // *************************************************************************
    // *************************************************************************
    // SUBMIT EVENTS
    
    
    // *********************************************
    // ADD BOOK
    if(document.getElementById("addBook"))
    {
        document.getElementById("addBook").addEventListener("submit", onSubmitAddBook)
    }
    
    
    // *********************************************
    // UPDATE BOOK
    const arrayForm = document.querySelectorAll(".updateBook")
    for(let j=0; j<arrayForm.length; j++)
    {
        arrayForm[j].addEventListener("submit", onSubmitUpdateBook)
    }
    
    
    // *********************************************
    // RESERVE BOOK
    if(document.getElementById("reserveBook"))
    {
        document.getElementById("reserveBook").addEventListener("submit", onSubmitReserveBook)
    }
    
    
    // *********************************************
    // UPDATE USER
    const arrayFormUser = document.querySelectorAll(".updateUser")
    for(let j=0; j<arrayFormUser.length; j++)
    {
        arrayFormUser[j].addEventListener("submit", onSubmitUpdateUser)
    }
    
    
    // *********************************************
    // REGISTRATION
    if(document.getElementById("registerUser"))
    {
        document.getElementById("registerUser").addEventListener("submit", onSubmitRegisterUser)
    }
    
    
    // *********************************************
    // LOGIN
    if(document.getElementById("login"))
    {
        document.getElementById("login").addEventListener("submit", onSubmitLoginUser)
    }
    
    
    // *********************************************
    // USER POSTS
    if(document.getElementById("sendPost"))
    {
        document.getElementById("sendPost").addEventListener("submit", onSubmitSendPost)
    }
    
    
    // *************************************************************************
    // *************************************************************************
    // KEYUP EVENTS
    
    
    // *********************************************
    // SEARCH BOOK
    if(document.getElementById("searchBook"))
    {
        document.getElementById("searchBook").addEventListener("keyup", onKeyUpSearchBook)
    }

    
})