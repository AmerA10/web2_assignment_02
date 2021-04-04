const companyAPI = 'api-companies.php';

let company = []; 
const companyList = document.querySelector('#companylist');
fetch(companyAPI)
    .then( response => {
        if(response.ok)
            return response.json() 
        else
            throw new Error("Response from json failed!")
        })
    .then( data => {
        console.log(data);
        company.push(...data);
        console.log(company);
       
    })
    .catch( error => console.log(`found a ${error}`) );

/* Adds each company either from local storage or API to a list, also adding
event delegation to the list of company (refer to displayInformation) */


