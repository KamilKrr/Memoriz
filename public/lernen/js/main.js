"use-strict";

let getCard = [];
let cardArray = [];
let gameStarted = false;


function init(){
    show();
    for (let i = 0; i < 16; i++) {
        let card = document.getElementById('card'+(i+1));
        card.addEventListener("click", function (){
            turn(i+1);
        })
        getCard.push(card);
    }

    
    for (let i = 0; i < 16; i++) {
        cardArray.push(new Card('card'+(i+1),false, getCard[i]));
    }

    document.querySelector(".fieldContainer").addEventListener("click", function(){
        if(!gameStarted){
            start();
            gameStarted = true;
        }
    });
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


let game = new Game(cardArray, 0, 0, 0,0);

let turnedCards = [];


function turn(id) {
    if (!cardArray[id - 1].isOpen) {
        cardArray[id - 1].card.classList.add("flip");
        cardArray[id - 1].card.classList.add("cardVisible");
        cardArray[id - 1].isOpen = true;

        game.addTurn();
        document.getElementById("turns").querySelectorAll("span")[0].innerHTML = Math.floor(game.getTurns()/2);

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

function toggleInfo(){
    document.getElementById("infoNotification").classList.toggle("is-hidden");
}
