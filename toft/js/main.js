"use-strict";

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


/**
 * Gets all card ids
 * @type {Array}
 */
let getCard = [];

for (let i = 0; i < 16; i++) {
    getCard.push(document.getElementById('card'+(i+1)));
}

/**
 * Array with all card objects
 * @type {Array}
 */
let cardArray = [];
for (let i = 0; i < 16; i++) {
    cardArray.push(new Card('card'+(i+1),false, getCard[i]));
}


let pairs = {
    1 : 12,
    2 : 13,
    3 : 7,
    4 : 14,
    5 : 11,
    6 : 8,
    7 : 3,
    8 : 6,
    9 : 16,
    10 : 15,
    11 : 5,
    12 : 1,
    13 : 2,
    14 : 4,
    15 : 10,
    16 : 9,
};

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
                setTimeout(() => {
                    cardArray[turnedCards[turnedCards.length-1]-1].card.classList.add("correctCard");
                    cardArray[turnedCards[turnedCards.length-2]-1].card.classList.add("correctCard");
                }, 400);
                game.addCorrect();
                document.getElementById("correct").querySelectorAll("span")[0].innerHTML = game.getCorrects();
            }else {
                console.log("pairs don't match");
                turnBack(turnedCards[turnedCards.length-1], turnedCards[turnedCards.length-2]);
            }
        }
    }
}


function turnBack(id1, id2) {
    setTimeout(() => {
        cardArray[id1-1].card.classList.add("wiggle");
        cardArray[id2-1].card.classList.add("wiggle");
    }, 600);

    setTimeout(() => {
        cardArray[id1-1].card.classList.remove("wiggle");
        cardArray[id2-1].card.classList.remove("wiggle");
    }, 1800);


    setTimeout(() => {
        cardArray[id1-1].card.classList.remove("flip");
        cardArray[id1-1].card.classList.remove("cardVisible");
        cardArray[id1-1].isOpen = false;

        cardArray[id2-1].card.classList.remove("flip");
        cardArray[id2-1].card.classList.remove("cardVisible");
        cardArray[id2-1].isOpen = false;

    }, 2800);
}

function checkCards(card1, card2) {
    return card1 == pairs[card2].toString() && card2 == pairs[card1].toString();
}
