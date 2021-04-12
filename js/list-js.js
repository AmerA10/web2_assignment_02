const companyAPI = 'stock-api.php';

let companies = []; 
const companyTable = document.querySelector('#list');
const filterBox = document.querySelector('#filter');
fetch(companyAPI)
    .then( response => {
        if(response.ok) 
            return response.json();
        else
            throw new Error("Response from json failed!")
        })
    .then( data => {
        companies.push(...data);
        companies.sort(function(a, b){
            let x = a.symbol.toLowerCase();
            let y = b.symbol.toLowerCase();
            if (x < y) {return -1;}
            if (x > y) {return 1;}
            return 0;
      });
        populateCompanyTable(companies);
    })
    .catch( error => console.log('found a ${error}') );

/* Adds a handler to search for a company typed in the textbox
(refer to findMatches function) */
filterBox.addEventListener('keyup', findMatches);
/* Adds a handler to the "Clear" button to repopulate the list when clicked 
(refer to clearButton function) */
document.querySelector(".reset").addEventListener('click', clearButton);

/* uses populateTable to input all information as well has display table after loading */
function populateCompanyTable(companies) {
    companies.forEach( company => {
        populateTable(company);
    });
    document.querySelector('.sk-circle').style.display = "none";
    document.querySelector('#table_wrapper').style.display = "block";
}

/* Finds the matches within the input box (refer to compareCompanies),
 and populates a list accordingly */
 function findMatches() {
    const matches = compareCompanies(this.value, companies);

    companyTable.innerHTML = '';

    matches.forEach( company => {
        populateTable(company);
    });
}

/* Returns a filtered array, looking through the  array for matching pairs 
starting from the beginning of the name. */
function compareCompanies(wordToFind, companies) {
    return companies.filter( comp => {
        const regex = new RegExp(`^${wordToFind}`, 'gi');
        return comp.name.match(regex);
    });
}

/* Empties the company list, then re-creates it along  with changing all
company-related panels to not  display */
function clearButton() {
    companyTable.innerHTML = '';
    companies.forEach( company => {
        populateTable(company);
    });
}

/*creates nessesary html elements and populates them for a table*/
function populateTable(company) {
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
}