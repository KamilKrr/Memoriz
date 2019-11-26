"use-strict";

/**
 * Gets all card ids
 * @type {Array}
 */
let getCard = [];

/**
 * Array with all card objects
 * @type {Array}
 */
let cardArray = [];

let gameStarted = false;


function init(){
    show();
    createMemory();
    
    for (let i = 0; i < 16; i++) {
        getCard.push(document.getElementById('card'+(i+1)));
    }

    
    for (let i = 0; i < 16; i++) {
        cardArray.push(new Card('card'+(i+1),false, getCard[i]));
    }

    document.querySelector(".field").addEventListener("click", function(){
        if(!gameStarted){
            start();
            gameStarted = true;
        }
    });

    document.getElementById("maingame").scrollIntoView();
}

document.addEventListener("DOMContentLoaded", init);

class Card {
    constructor(name, isOpen, card){
        this.name = name;
        this.isOpen = isOpen;
        this.card = card;
    }
    turn(){
        this.isOpen = !this.isOpen;
    }
    toString(){
        return this.name + "[isOpen: " + this.isOpen + "]";
    }
}

class Game {
    constructor(cards, pairs, turns, trys, corrects){
        this.cards = cards;
        this.pairs = pairs;
        this.turns = turns;
        this.trys = trys;
        this.corrects = corrects;
    }
    getPairs(){
        return this.pairs;
    }

    addTurn(){
        this.turns++;
    }
    addCorrect(){
        this.corrects++;
    }
    getTurns(){
        return this.turns.toString();
    }
    getCorrects(){
        return this.corrects.toString();
    }
}

let cardContent = {
    1: "Abteilungen",
    2: "Informatik, Mechatronik, Fachschule",
    3: "Direktor",
    4: "<img src='https://www.htl.rennweg.at/wp-content/uploads/2018/09/AK00287431.jpg'>",
    5: "So viele Schüler haben wir",
    6: "1058",
    7: "Kooperations-Partner",
    8: "Wiener Linien, Siemens, EVVA",
    9: "Leckeres und günstiges Essen",
    10: "Schulkantine",
    11: "Programmier-Sprachen",
    12: "JAVA, PHP, Javascript",
    13: "HTL for Future",
    14: "<img src='https://www.htl.rennweg.at/wp-content/uploads/2019/10/untitled-54.jpg'>",
    15: "Ich entscheide mich für...",
    16: "...die HTL Rennweg"
}


let pairs = {
    1 : 2,
    2 : 1,
    3 : 4,
    4 : 3,
    5 : 6,
    6 : 5,
    7 : 8,
    8 : 7,
    9 : 10,
    10 : 9,
    11 : 12,
    12 : 11,
    13 : 14,
    14 : 13,
    15 : 16,
    16 : 15,
};

function createMemoryCard(id){

    id = Number(id);

    let memoryCard = document.createElement("div");
    memoryCard.className = "cardHolder";
    memoryCard.id = "cardHolder" + id;
    memoryCard.addEventListener("click", function(){
        turn(id);
    });

    let card = document.createElement("div");
    card.className = "card";
    card.id = "card" + id;

    let par = document.createElement("p");
    par.innerHTML = cardContent[id];

    card.appendChild(par);
    memoryCard.appendChild(card);

    return memoryCard;
}

function shuffle(array) {
    array.sort(() => Math.random() - 0.5);
  }

function createMemory(){
    let ids = [];

    for (let val in pairs) {
        if (Object.prototype.hasOwnProperty.call(pairs, val)) {
            ids.push(val);
        }
    }

    shuffle(ids);

    let field = document.querySelector("#cardBoard");
    for (let i = 0; i < ids.length; i++) {
        let card = createMemoryCard(ids[i]);
        field.appendChild(card);
    }
}




let game = new Game(cardArray, 0, 0, 0,0);

let turnedCards = [];


function turn(id) {
    if (!cardArray[id - 1].isOpen) {
        cardArray[id - 1].card.classList.add("flip");
        cardArray[id - 1].card.classList.add("cardVisible");
        cardArray[id - 1].isOpen = true;

        game.addTurn();
        document.getElementById("turns").querySelectorAll("span")[0].innerHTML = game.getTurns();

        turnedCards.push(id);
        
        if (turnedCards.length !== 0 && turnedCards.length%2 === 0){
            if (checkCards(turnedCards[turnedCards.length-1], turnedCards[turnedCards.length-2])){

                let card1 = turnedCards[turnedCards.length-1];
                let card2 = turnedCards[turnedCards.length-2];
                setTimeout(() => {
                    cardArray[card1-1].card.classList.add("correctCard");
                    cardArray[card2-1].card.classList.add("correctCard");
                }, 400);
                game.addCorrect();
                document.getElementById("correct").querySelectorAll("span")[0].innerHTML = game.getCorrects();

                if(Number(game.getCorrects()) >= 8){
                    stop();
                    setTimeout(() => {
                        document.getElementById("gamecomplete").classList.toggle("hide");
                        //Import Confetti
                        var imported = document.createElement("script");    
                        imported.src = "/public/toft/js/particles.js";
                        document.getElementsByTagName("head")[0].appendChild(imported);
                    }, 1000); 
                }
            }else {
                //console.log("pairs don't match");
                turnBack(turnedCards[turnedCards.length-1], turnedCards[turnedCards.length-2]);
            }
        }
    }
}


function turnBack(id1, id2) {
    setTimeout(() => {
        cardArray[id1-1].card.classList.add("wiggle");
        cardArray[id2-1].card.classList.add("wiggle");
    }, 200);

    setTimeout(() => {
        cardArray[id1-1].card.classList.remove("wiggle");
        cardArray[id2-1].card.classList.remove("wiggle");
    }, 1200);


    setTimeout(() => {
        cardArray[id1-1].card.classList.remove("flip");
        cardArray[id1-1].card.classList.remove("cardVisible");
        cardArray[id1-1].isOpen = false;

        cardArray[id2-1].card.classList.remove("flip");
        cardArray[id2-1].card.classList.remove("cardVisible");
        cardArray[id2-1].isOpen = false;

    }, 1300);
}


function checkCards(card1, card2) {
    return card1 == pairs[card2].toString() && card2 == pairs[card1].toString();
}
