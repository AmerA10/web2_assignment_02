const companyAPI = 'stock-api.php';

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
        tdimg.innerHTML = `<img src="logos/${company.symbol}.svg" style="width:160px;height:100px">`;
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