const companyAPI = 'api-companies.php';
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
        populateCompanyList(companies);
        MakeClickable();
    })
    .catch( error => console.log('found a ${error}') );

/* Adds each company either from local storage or API to a list, also adding
event delegation to the list of company (refer to displayInformation) */
function populateCompanyList(companies) {
    companies.forEach( company => {
        let symbol  =company.symbol;
        symbol = symbol.toLowerCase();
        let li = document.createElement('li');
        li.innerHTML = `<div class='list-item-section1'><img src="logos/${company.symbol}.svg" style="width:60px;height:60px"></div>` 
        + `<div class='list-item-section2'><a href = list.php?symbol=${symbol}>${company.symbol}</div>`
        + `<div class='list-item-section3'><a href = list.php?symbol=${symbol}>${company.name}</div>`;
        companyList.appendChild(li);
    });
    setTimeout( () => {
        document.querySelector('.sk-circle').style.display = "none";
        companyList.style.display = "inline-block";
    }, 1000);
}

function MakeClickable() {
   
  let list = companyList.querySelectorAll('li');
    for(company of list){
        let symbol = company.querySelector('.list-item-section3');
        let name = company.querySelector('.list-item-section2');
        symbol.addEventListener('click', (e)=> {
            console.log("you clicked text" + e.target.innerHTML);           
        });
        name.addEventListener('click', (e)=> {
            //todo get symbol from the name           
        });
        
    };
}
<?php echo "what" ?>