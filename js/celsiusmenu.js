debug = true;

const menuUrl = 'https://script.google.com/macros/s/AKfycbzSMO68LJqEYYZX5gChHe1njDeGFOu7FGYvuH379bPi8vvdVhRt/exec';

let getJSON = function (url, callback) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);
  xhr.responseType = 'json';
  xhr.onload = function () {
    let status = xhr.status;
    if (status === 200) {
      callback(null, xhr.response);
    } else {
      callback(status, xhr.response);
    }
  };
  xhr.send();
}

getJSON(menuUrl, function (err, data) {
  if (err !== null) {
    console.log('The menu did not load: ' + err);
  } else {
    drawMenu(data);
  };
});

function drawMenu(wineList) {

  // Split main array into array of each section.
  let sectionIndices = [];
  let sections = [];
  for (let i = 0; i < wineList.list.length; i++) {
    let row = wineList.list[i];
    if (row.section) {
      sectionIndices.push(i);
    }
  }
 
  sectionIndices.forEach(function(section, i) {
    sections[i] = wineList.list.slice(sectionIndices[i], sectionIndices[i + 1]);
  });
  
  // Split Sections into subcategory arrays
  let subcatIndices = [];

  for(let i = 0; i < sections.length; i++) {
    subcatIndices[i] = [];
    for( let j = 0; j < sections[i].length; j++) { 
      if(sections[i][j].subcat) {
        subcatIndices[i].push(j);
      }
    }
  }

  let newSections = [];

  for( let i = 0; i < sections.length; i++) {
    newSections[i] = [];
    newSections[i].push(sections[i][0]);
    subcatIndices[i].forEach(function(subcat, j) {
      newSections[i][j+1] = sections[i].slice(subcatIndices[i][j], subcatIndices[i][j+1]);
    });
  }
  
  let wineMenu = newSections;

  if(debug) {
    console.log(wineMenu);
  }

  // Create subnav for menu
  let subNav = document.createElement('ul');
  subNav.classList.add('menu-subnav');
  let subNavHTML = '';
  for (let i = 0; i < wineMenu.length; i++) {
    subNavHTML += '<li><a href="#section' + i + '">' + wineMenu[i][0].section + '</a></li>';
  }
  subNav.innerHTML = subNavHTML;

  document.querySelector('.subnav').append(subNav);


  // Display the Menu
  
  // Temporary placeholder content
  // TODO: Add descriptions to Google Sheet
  let sectionDesc = 'Our list of fine and dynamic wines from all over the world is curated and cared for by Adele Corrigan. Let our staff help you find that glass or bottle of wine in our cellar that is meant specifically for you. We are able to offer tastes of a lot of our wines.';
  let subCatDescr = 'Our list of fine and dynamic wines from all over the world is curated and cared for by Adele Corrigan. Let our staff help you find that glass or bottle of wine in our cellar that is meant specifically for you. We are able to offer tastes of a lot of our wines.';

  // // Create div and add header for each section
  for( let i = 0; i < wineMenu.length; i++) {
    let section = wineMenu[i];
    let sectionDiv = document.createElement('div');
    sectionDiv.setAttribute('id', 'section' + i);
    sectionDiv.classList.add('menu-section');
    sectionHeader = document.createElement('h2');
    sectionHeader.classList.add('menu-section-header');
    sectionHeader.innerHTML = section[0].section;
    //TODO: Replace description with description from Google Sheet.
    let sectionDescription = document.createElement('p');
    sectionDescription.classList.add('menu-section__desc');
    sectionDescription.innerHTML = sectionDesc;

    // add sectionHeader to sectionDiv
    sectionDiv.appendChild(sectionHeader);
    sectionDiv.appendChild(sectionDescription);
    // create subcat
    for (let j = 1; j < section.length; j++) {
      let subCat = section[j];
      let subCatHTML = document.createElement('div');
      subCatHTML.classList.add('menu-subcategory');

      let subCatHeader = document.createElement('div');
      subCatHeader.classList.add('subcategory-header', 'accordion-button');
      subCatHeader.innerHTML = '<h3>' + subCat[0].subcat + '</h3>';

      //TODO: Replace description with Google Sheet Description.
      let subCatDescription = document.createElement('p');
      subCatDescription.classList.add('subcategory-desc');
      subCatDescription.innerHTML = subCatDescr;

      let subCatDiv = document.createElement('div');
      subCatDiv.classList.add('table-wrapper', 'accordion-panel');
      let subCatTable = document.createElement('table');
      subCatTable.classList.add('subcategory-table');
      
      let subCatTableHead = '<thead><tr><th></th><th>' + subCat[0].glass + '</th><th>' + subCat[0].half + '</th><th>' + subCat[0].bottle + '</th></tr></thead>';

      let subCatRows = document.createElement('tbody');
    
      for(let k = 1; k < subCat.length; k++) {
        let wine = subCat[k];
        let subCatRow = document.createElement('tr');
        subCatRow.classList.add('wine-row');
        
        
        let wineDetails = document.createElement('td');
        let wineName, wineType, wineOrigin, wineNotes, wineGlass, wineHalf, wineBottle;
        if(wine.name) {
          wineName = document.createElement('span');
          wineName.classList.add('wine-name');
          wineName.innerHTML = wine.name;
          wineDetails.append(wineName);
        }
        if(wine.type) {
          wineType = document.createElement('span');
          wineType.classList.add('wine-type');
          wineType.innerHTML = wine.type;
          wineDetails.append(wineType);
        }
        if(wine.origin) {
          wineOrigin = document.createElement('span');
          wineOrigin.classList.add('wine-origin');
          wineOrigin.innerHTML = wine.origin;
          wineDetails.append(wineOrigin);
        }
        if(wine.notes) {
          wineNotes = document.createElement('span');
          wineNotes.classList.add('wine-notes');
          wineNotes.innerHTML = wine.notes;
          wineDetails.append(wineNotes);
        }
        subCatRow.append(wineDetails);

        wineGlass = document.createElement('td');
        wineGlass.classList.add('wine-glass');
        if(wine.glass) {
          //wineGlass.innerHTML = 'yes';
          wineGlass.classList.add('available');
        } else {
          wineGlass.classList.add('unavailable');
        }
        subCatRow.append(wineGlass);

        wineHalf = document.createElement('td');
        wineHalf.classList.add('wine-half');
        if(wine.half) {
          wineHalf.classList.add('available');
        } else {
          wineHalf.classList.add('unavailable');
        }
        subCatRow.append(wineHalf);
        
        wineBottle = document.createElement('td');
        wineBottle.classList.add('wine-bottle');
        if(wine.bottle) {
          wineBottle.classList.add('available');
        } else {
          wineBottle.classList.add('unavailable');
        }
        subCatRow.append(wineBottle);
        
        subCatRows.append(subCatRow);
      }

      subCatTable.innerHTML = subCatTableHead;
      subCatTable.append(subCatRows);

      // Combine all of the pieces into subCatHTML
      subCatHTML.append(subCatHeader);
      subCatDiv.append(subCatDescription);
      subCatDiv.append(subCatTable);
      subCatHTML.append(subCatDiv);
      sectionDiv.append(subCatHTML);
    }

    document.getElementById('wine-menu').append(sectionDiv);
  } 
  
  //Accordion Animation
  let accordion = document.getElementsByClassName('accordion-button');

  for (let i = 0; i < accordion.length; i++) {
    accordion[i].addEventListener('click', function () {
      this.classList.toggle('active');
      let panel = this.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      }
    });
  }

} //end drawMenu

