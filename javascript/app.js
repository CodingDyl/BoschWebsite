const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');

    burger.addEventListener('click', () => {
        nav.classList.toggle('nav-active');

        //animate links
        navLinks.forEach((link, index)=>{
            if(link.style.animation) {
                link.style.animation = '';
            } else {
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`;
            }
        });

        //Animation for menu
        burger.classList.toggle('toggle');
    });
}

function nextPage() {
    window.location.href="quote.php";
}

var fc = document.getElementById('facebook');
if(fc) {
    fc.addEventListener("click", facebookClick);
}

function facebookClick() {
    window.location.href="https://www.facebook.com/northcliffauto";
}


var ig = document.getElementById('instagram');
if(ig) {
    ig.addEventListener("click", instagramClick);
}

function instagramClick() {
    window.location.href="https://www.instagram.com/sitepad/";
}


navSlide();


//Quote Screen

//Variables
const form = document.getElementById('request-quote');
const manuCar = document.getElementById('manu');
const html = new htmlUI();



//event listener
function eventListeners() {
    document.addEventListener('DOMContentLoaded', function() {
        html.displayYears();
    }); 
    
    //When form is submitted
    form.addEventListener('submit', function(e) {
        e.preventDefault(); 

        const type = document.getElementById('type').value;
        const fuel = document.getElementById('ftype').value;
        const manufact = document.getElementById('manu').value;
        const year = document.getElementById('year').value;

        const getCar = document.getElementById('manu');

        const carName = getCar.options[getCar.selectedIndex].text;

        //read the radio buttons
        const service = document.querySelector('input[name="level"]:checked').value;


        if ( type === '' || fuel === '' || manufact === '' || year === '' || service === '') {
            html.displayError('All the fields are mandatory!');
        } else {
            //Clear old quotes

            const prevResult = document.querySelector('#result div');

            if (prevResult != null) {
                prevResult.remove();
            }
            // Make the quotation
            const serviceObj = new Service(type, fuel, manufact, year, service, carName);
            const price = serviceObj.calculateQuotation(serviceObj);

            //print the result

            html.showResults(price, serviceObj);
        }
        
    });
}


//Objects

//Quotation
function Service(type, fuel, manu, year, service, carName) {
    this.type = type;
    this.fuel = fuel;
    this.manu = manu;
    this.year = year;
    this.service = service;
    this.carName = carName;

}
//calculate the price of service
Service.prototype.calculateQuotation = function(serviceObj) {
    let price;
    const base = 1200;
    const consumables = 300;
    const lightVeh = 200;
    const Truck = 500;
    const petrol = 200;
    const Diesel = 300;
    const electric = 500;
    const basic = 400;
    const major = 1000;
    const carCat1 = 1000;
    const carCat2 = 800;
    const carCat3 = 600;

    price = base + consumables;

    //get the type
    let carType = serviceObj.type;

    switch(carType) {
        case 'Light':
            price = price + lightVeh;
            break;
        case 'Truck':
            price = price + Truck;
            break;
    }

    //get the fuel
    let carFuel = serviceObj.fuel;

    switch(carFuel) {
        case 'Petrol':
            price = price + petrol;
            break;
        case 'Diesel':
            price = price + Diesel;
            break;
        case 'Electric/Hybrid':
            price = price + electric;
    }

    //get the year
    let carYear = serviceObj.year;

    //get the years difference
    const difference = this.getYearDifference(carYear);

    //every 5 years it will be 2% more

    if (difference % 5 === 0 ) {
        price = price + ((difference * 2) * price) / 100;
    }
    

    //get the level
    const carLevel = serviceObj.service;

    switch(carLevel) {
        case 'basic':
            price = price + basic;
            break;
        case 'major':
            price = price + major;
            break;
    }

    //get the manu
    const carManu = serviceObj.manu;

    switch(carManu) {
        case '1':
            price = price + carCat1;
            break;
        case '2':
            price = price + carCat2;
            break;
        case '3':
            price = price + carCat3;
            break;
    }

    return price;

}

//returns diffrence in years
Service.prototype.getYearDifference = function(year) {
    return new Date().getFullYear() - year;
}

//html section
function htmlUI() {}

htmlUI.prototype.displayYears = function() {
    //max and minimum years
    const max = new Date().getFullYear();
    const min = max - 17;

    //generate the list

    const selectYears = document.getElementById('year');

    //print values
    for (let i = max; i >= min; i--) {
        const option = document.createElement('option');
        option.value = i;
        option.textContent = i;
        selectYears.appendChild(option);
    }



}

//Prints and Error

htmlUI.prototype.displayError = function(message) {
    //create a div
    const div = document.createElement('div');
    div.classList = 'error';

    div.innerHTML = `
        <p>${message}</p>
    `;

    form.insertBefore(div, document.querySelector('.form-group'));

    //remove the error
    setTimeout(function() {
        document.querySelector('.error').remove();
    }, 3000);
}

//display range
htmlUI.prototype.displayRange = function(manu) {

    const selectRange = document.querySelector('range');

    //option variables
    let option = document.createElement('option');


    //print options
    if (manu === 'Alfa') {
        option.value = 'Alpha 145';
        option.textContent = 'Alpha 145';
        selectRange.appendChild(option);

        option.value = 'Alpha 146';
        option.textContent = 'Alpha 146';
        selectRange.appendChild(option);

        option.value = 'Alpha 147';
        option.textContent = 'Alpha 147';
        selectRange.appendChild(option);

        option.value = 'Alpha 156';
        option.textContent = 'Alpha 156';
        selectRange.appendChild(option);

        option.value = 'Alpha 159';
        option.textContent = 'Alpha 159';
        selectRange.appendChild(option);

        option.value = 'Brera';
        option.textContent = 'Brera';
        selectRange.appendChild(option);

        option.value = 'Giulietta';
        option.textContent = 'Giulietta';
        selectRange.appendChild(option);

        option.value = 'GT';
        option.textContent = 'GT';
        selectRange.appendChild(option);

        option.value = 'GTV';
        option.textContent = 'GTV';
        selectRange.appendChild(option);

        option.value = 'Mito';
        option.textContent = 'Mito';
        selectRange.appendChild(option);
    }

    if (manu === 'Audi') {
        option.value = 'A1';
        option.textContent = 'A1';
        selectRange.appendChild(option);

        option.value = 'A2';
        option.textContent = 'A2';
        selectRange.appendChild(option);

        option.value = 'A3';
        option.textContent = 'A3';
        selectRange.appendChild(option);

        option.value = 'A4';
        option.textContent = 'A4';
        selectRange.appendChild(option);

        option.value = 'A5';
        option.textContent = 'A5';
        selectRange.appendChild(option);

        option.value = 'A6';
        option.textContent = 'A6';
        selectRange.appendChild(option);

        option.value = 'A7';
        option.textContent = 'A7';
        selectRange.appendChild(option);

        option.value = 'A8';
        option.textContent = 'A8';
        selectRange.appendChild(option);

        option.value = 'Q2';
        option.textContent = 'Q2';
        selectRange.appendChild(option);

        option.value = 'Q5';
        option.textContent = 'Q5';
        selectRange.appendChild(option);

        option.value = 'Q7';
        option.textContent = 'Q7';
        selectRange.appendChild(option);

        option.value = 'R8';
        option.textContent = 'R8';
        selectRange.appendChild(option);

        option.value = 'RS4';
        option.textContent = 'RS4';
        selectRange.appendChild(option);

        option.value = 'RS5';
        option.textContent = 'RS5';
        selectRange.appendChild(option);

        option.value = 'S3';
        option.textContent = 'S3';
        selectRange.appendChild(option);

        option.value = 'S4';
        option.textContent = 'S4';
        selectRange.appendChild(option);

        option.value = 'S5';
        option.textContent = 'S5';
        selectRange.appendChild(option);

        option.value = 'S6';
        option.textContent = 'S6';
        selectRange.appendChild(option);

        option.value = 'S8';
        option.textContent = 'S8';
        selectRange.appendChild(option);

        option.value = 'TT';
        option.textContent = 'TT';
        selectRange.appendChild(option);
    }
}
//Prints the result
htmlUI.prototype.showResults = function(price, serviceObj) {
    //print the result
    const result = document.getElementById('result');

    //create a div
    const div = document.createElement('div');

    let type = serviceObj.type;

    switch(type) {
        case 'Light':
            type = "Light Motor Vehicle";
            break;
        case 'Truck':
            type = "Truck";
            break;
    }

    const fuelType = serviceObj.fuel;

    const carYear = serviceObj.year;

    
    const manu = serviceObj.manu;

    const car = serviceObj.carName;

    const serviceType = serviceObj.service;


    //Insert the result
    div.innerHTML = ` 
    <p class="header">Summary</p>
    <p>Type: ${type}</p>
    <p>Fuel Type: ${fuelType}</p>
    <p>Manufacturer: ${car}</p>
    <p>Year: ${carYear}</p>
    <p>Service Type: ${serviceType}</p>
    <p class="total">Total: R ${price}.00</p>
    `;

    //Insert this into html

    //show loading image
    const spinner = document.querySelector('#loading img');
    const book_now = document.querySelector('#book');
    spinner.style.display = 'block';

    setTimeout(function() {
        spinner.style.display = 'none';
        result.appendChild(div);
        book_now.style.display = 'block';
    }, 3000); 

    document.cookie = `price=${price}`;

}

eventListeners();

// ------------------------ Contact Page --------------------------------

function sendEmail() {
    Email.send({
        Host : "smtp.gmail.com",
        Username : "2610dylan@gmail.com",
        Password : "2101T@ryn",
        To : '2610dylan@gmail.com',
        From : document.getElementById('email-second').value,
        Subject : "New Contact Form Enquiry",
        Body : "Name: " + document.getElementById('name-contact').value + "<br> Email: " + document.getElementById('email-second').value + "<br> Number: " + document.getElementById('number').value + "<br> Message: " + document.getElementById('msg').value

    }).then(
      message => alert("Message Sent Successfully")
    );
}

