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

The program should show the progress of the game via stdout or a HTML page. This could show as follows:
- [14:57:41] Starting game with Alice, Bob, Carol, Eve 
- [14:57:41] Alice has been dealt: ♣10 ♣8 ♠3 ♦A ♣9 ♣3 ♠A 
- [14:57:41] Bob has been dealt: ♥4 ♦5 ♣5 ♦2 ♦8 ♦K ♦9 
- [14:57:41] Carol has been dealt: ♦Q ♥7 ♠9 ♠J ♠7 ♠Q ♠6 
- [14:57:41] Eve has been dealt: ♥A ♠10 ♥5 ♦10 ♣6 ♣4 ♠2 
- [14:57:41] Top card is: ♥10
- [14:57:41] Alice plays ♣10
- [14:57:41] Bob plays ♣5
- [14:57:41] Carol does not have a suitable card, taking from deck ♦6 
- [14:57:41] Eve plays ♥5
- [14:57:41] Alice does not have a suitable card, taking from deck ♠4 
- [14:57:41] Bob plays ♥4
- [14:57:41] Carol plays ♥7
- [14:57:41] Eve plays ♥A
- [14:57:41] Alice plays ♦A
- [14:57:41] Bob plays ♦5
- [14:57:41] Carol plays ♦Q
- [14:57:41] Eve plays ♦10
- [14:57:41] Alice does not have a suitable card, taking from deck ♣7 
- [14:57:41] Bob plays ♦2
- [14:57:41] Carol plays ♦6
- [14:57:41] Eve plays ♣6
- [14:57:41] Alice plays ♣8
- [14:57:41] Bob plays ♦8
- [14:57:41] Carol does not have a suitable card, taking from deck ♣Q 
- [14:57:41] Eve does not have a suitable card, taking from deck ♦J 
- [14:57:41] Alice does not have a suitable card, taking from deck ♠K 
- [14:57:41] Bob plays ♦K
- [14:57:41] Bob has 1 card remaining!
- [14:57:41] Carol does not have a suitable card, taking from deck ♥3 
- [14:57:41] Eve plays ♦J
- [14:57:41] Alice does not have a suitable card, taking from deck ♥J 
- [14:57:41] Bob plays ♦9
- [14:57:41] Bob has won.