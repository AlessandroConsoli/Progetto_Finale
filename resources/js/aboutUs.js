let opener = document.querySelector('.opener');
let circle = document.querySelector('.circle');

let teachers = [
    {name: 'Daniel', description: 'Singer and guitarist', url: 'https://picsum.photos/301'},
    {name: 'Manuel', description: 'Bass Player', url: 'https://picsum.photos/302'},
    {name: 'Johan', description: 'Lead Guitarist', url: 'https://picsum.photos/303'},
    {name: 'Leo', description: 'Drummer', url: 'https://picsum.photos/304'},
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