'use strict';

// *****************************************************************************
// SAVE DATA IN LOCAL STORAGE
function saveDataInLS(entry, element)
{
    localStorage.setItem(entry, element)
    
}


// *****************************************************************************
// GET DATA FROM LOCAL STORAGE
function getDataFromLS(entry)
{
    return localStorage.getItem(entry)
}