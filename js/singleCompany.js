const companyAPI = 'stock-api.php';

let companies = []; 
const companyList = document.querySelector('#companylist');
fetch(companyAPI)
    .then( response => {
        if(response.ok)
            return response.json() 
        else
            throw new Error("Response from json failed!")
        })
    .then( data => {
        companies.push(...data);
        console.log(companies);
       
    })
    .catch( error => console.log(`found a ${error}`) );

/* Adds each company either from local storage or API to a list, also adding
event delegation to the list of company (refer to displayInformation) */


