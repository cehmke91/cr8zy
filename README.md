# Cr8zy - a game of crazy eights
## Assignment
Write a program that pits four virtual card players against each other in a simplified version of the card game Crazy Eights (Dutch: “Pesten”).
Functionally, the game should work as follows:
- Shuffle 52 cards, and deal each player seven cards (no joker cards). The remaining set of cards is called the deal pile.
- Take a card from the deal pile. This card is the first card that is put in the central discard pile.
- The players take turns to put a card from their hand on the discard pile. A player may only put a card on the discard pile if the card is of the same suit or the same numerical value.
- If a player cannot put a card on the discard pile, the player must take a card from the deal pile.
- If the deal pile is empty, the player skips a turn.
- If a player has no more cards in his hand, the game is won by that player.
- The goal of the assignment is to program a game that follows the above rules without
intervention from a human agent. It is explicitly not a requirement to program an interactive
game.
- Try to complete the assignment without the use of a framework.

The program should show the progress of the game via stdout or a HTML page. This could show as follows: <br/>
[14:57:41] Starting game with Alice, Bob, Carol, Eve <br/>
[14:57:41] Alice has been dealt: ♣10 ♣8 ♠3 ♦A ♣9 ♣3 ♠A <br/>
[14:57:41] Bob has been dealt: ♥4 ♦5 ♣5 ♦2 ♦8 ♦K ♦9 <br/>
[14:57:41] Carol has been dealt: ♦Q ♥7 ♠9 ♠J ♠7 ♠Q ♠6 <br/>
[14:57:41] Eve has been dealt: ♥A ♠10 ♥5 ♦10 ♣6 ♣4 ♠2 <br/>
[14:57:41] Top card is: ♥10 <br/>
[14:57:41] Alice plays ♣10 <br/>
[14:57:41] Bob plays ♣5 <br/>
[14:57:41] Carol does not have a suitable card, taking from deck ♦6 <br/>
[14:57:41] Eve plays ♥5 <br/>
[14:57:41] Alice does not have a suitable card, taking from deck ♠4 <br/>
[14:57:41] Bob plays ♥4 <br/>
[14:57:41] Carol plays ♥7 <br/>
[14:57:41] Eve plays ♥A <br/>
[14:57:41] Alice plays ♦A <br/>
[14:57:41] Bob plays ♦5 <br/>
[14:57:41] Carol plays ♦Q <br/>
[14:57:41] Eve plays ♦10 <br/>
[14:57:41] Alice does not have a suitable card, taking from deck ♣7 <br/>
[14:57:41] Bob plays ♦2 <br/>
[14:57:41] Carol plays ♦6 <br/>
[14:57:41] Eve plays ♣6 <br/>
[14:57:41] Alice plays ♣8 <br/>
[14:57:41] Bob plays ♦8 <br/>
[14:57:41] Carol does not have a suitable card, taking from deck ♣Q <br/>
[14:57:41] Eve does not have a suitable card, taking from deck ♦J <br/>
[14:57:41] Alice does not have a suitable card, taking from deck ♠K <br/>
[14:57:41] Bob plays ♦K <br/>
[14:57:41] Bob has 1 card remaining! <br/>
[14:57:41] Carol does not have a suitable card, taking from deck ♥3 <br/>
[14:57:41] Eve plays ♦J <br/>
[14:57:41] Alice does not have a suitable card, taking from deck ♥J <br/>
[14:57:41] Bob plays ♦9 <br/>
[14:57:41] Bob has won. <br/>

## Running the Project
Requirements:
 - php7.4
 - composer
 
Using the command line, cd to the project directory and run command `php Cr8zy.php`
The configuration available (player names) can be set in the `Cr8zy.php` file.

## Thoughts on the Solution
### Brain Service
Why use this service to link through to the RulesService and not simply let the game use the rules? <br/>
This would more easily allow us to not only simply interepret and follow the rules as with the current
case, but also make decisions based on the rules. This becomes more relevant if things like strategies 
are applied, like which cards to throw first. It also allows extensibility to other rulesets if needed.

### TableService
Using a service instead of a model and controller here since while we can think of it as an actual
table the usage in gaming is more of an abstract. Keeping the more abstract form of the table this
way allows us to keep the implementation simpler above as we don't need a table model with a lot of
functions to deal with the other objects which calls it their home.

### GameController
The flow of the core gameplay loop currently lives inside the GameController, this definitely need not
be the case. It could also be living inside another service which executes the business logic inside the flow.
Doing so would mean that we could also more easily swap out the game for another using the same controller.
The only reason for leaving it there is time.

### Unit Tests
Coverage could be better here. Simply a time thing.
