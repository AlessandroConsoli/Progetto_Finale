let opener = document.querySelector('.opener');
let circle = document.querySelector('.circle');

let teachers = [
    {name: 'John Smith', description: 'Digital Marketing Manager', url: '/img/person_1.jpg'},
    {name: 'Manuel Gilmore', description: 'Project Manager', url: '/img/person_2.jpg'},
    {name: 'Johan Alson', description: 'Social Media Manager', url: '/img/person_3.jpg'},
    {name: 'Leo Scardina', description: 'Product Manager', url: '/img/person_4.jpg'},
];

teachers.forEach( (docente)=>{
    let div = document.createElement('div');
    div.classList.add('moved');
    div.style.backgroundImage = `url(${docente.url})`;
    circle.appendChild(div);
});


let movedDivs = document.querySelectorAll('.moved');

let check2 = false;

let flipCard = document.querySelector('.flip-card');

let cardWrapper = document.querySelector('#cardWrapper');


opener.addEventListener('click', ()=>{
    if (check2 == false) {
        opener.style.transform = 'rotate(360deg)';
        movedDivs.forEach( (moved, i)=>{
            let angle = (360 * i) / movedDivs.length;
            
            moved.style.transform = `rotate(${angle}deg) translate(150px) rotate(-${angle}deg)`;
        });
        check2 = true;
    }else{
        check2 = false;
        opener.style.transform = '';
        movedDivs.forEach( (moved, i)=>{    
            moved.style.transform = ``;
        });
        cardWrapper.innerHTML = '';        
    }
    
});


let cardName = document.querySelector('#cardName');
let cardDescription = document.querySelector('#cardDescription');


movedDivs.forEach( (moved, i)=>{
    moved.addEventListener('click', ()=>{
        let docente = teachers[i];
        cardWrapper.innerHTML = '';

        let div = document.createElement('div');
        div.classList.add('flip-card');
        div.innerHTML = `
        <div class="inner">
            <div class="inner-face"></div>
            <div class="inner-back">
                <p id="cardName" class="h4 fs-80">${docente.name}</p>
                <p id="cardDescription" class="lead fs-30">${docente.description}</p>
            </div>
        </div>
        `;

        cardWrapper.appendChild(div);
        
        let innerFace = document.querySelector('.inner-face');
        innerFace.style.backgroundImage = `url(${docente.url})`;
        
    })
    
});