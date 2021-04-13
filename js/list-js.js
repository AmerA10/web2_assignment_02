const companyAPI = 'api-companies.php';
let companies = []; 
const companyTable = document.querySelector('#list');
fetch(companyAPI)
    .then( response => {
        if(response.ok) 
            return response.json();
        else
            throw new Error("Response from json failed!")
        })
    .then( data => {
        companies.push(...data);

        populateCompanyTable(companies);
        MakeClickable();

    })
    .catch( error => console.log('found a ${error}') );

function populateCompanyTable(companies) {
    companies.forEach( company => {

        let symbol = company.symbol;
        symbol = symbol.toLowerCase();

        let tr = document.createElement('tr');
        let tdimg = document.createElement('td');
        //had to add this sperate for css (flexbox)
        tdimg.className = 'logo';
        let tdlink1 = document.createElement('td');
        let tdlink2 = document.createElement('td');
        tdimg.innerHTML = `<img id = "listImg" src="logos/${company.symbol}.svg" >`;
        tr.appendChild(tdimg);
        tdlink1.innerHTML = `<a class='link' href='single-company.php?symbol=${symbol}'>${company.symbol}</a>`;
        tr.appendChild(tdlink1);
        tdlink2.innerHTML = `<a class='link' href='single-company.php?symbol=${symbol}'>${company.name}</a>`;
        tr.appendChild(tdlink2);
        companyTable.appendChild(tr);

    });
    setTimeout( () => {
        document.querySelector('.sk-circle').style.display = "none";
        document.querySelector('#table_wrapper').style.display = "block";
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