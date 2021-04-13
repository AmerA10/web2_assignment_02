
const filterBox = document.querySelector('#filter');

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
    
    tdimg.innerHTML = `<img id = 'listImg' src="logos/${company.symbol}.svg" style="width: 150px; height: 50px">`;
    tr.appendChild(tdimg);

    // creating the larger image to show when hovering
    let enlargedImg = document.createElement('div');
    enlargedImg.className = 'enlargedImg';
    enlargedImg.innerHTML = `<img id= 'enlargedListImg 'src="logos/${company.symbol}.svg" style="width: 300px; height: 100px">`;
    tdimg.appendChild(enlargedImg);

    tdlink1.innerHTML = `<a class='link' href='single-company.php?symbol=${symbol}'>${company.symbol}</a>`;
    tr.appendChild(tdlink1);
    tdlink2.innerHTML = `<a class='link' href='single-company.php?symbol=${symbol}'>${company.name}</a>`;
    tr.appendChild(tdlink2);

    tdimg.addEventListener('mouseenter', function() {
        enlargedImg.style.display = 'block';
    })
    tdimg.addEventListener('mouseleave', function() {
        enlargedImg.style.display = 'none';
    })
    tdimg.addEventListener('mousemove', function(e) {
        const yPos = e.pageY - 125; // modifying positions so that they appear closer to the cursor
        const xPos = e.pageX - 150;
        enlargedImg.style.top = `${yPos}px`;
        enlargedImg.style.left = `${xPos}px`;
    })
    companyTable.appendChild(tr);  

}