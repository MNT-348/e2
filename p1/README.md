_Any instructions/notes in italics should be removed from the template before submitting_

# Project 1
+ By: Minh Tran
+ URL: <http://e2p1.hesdgmde2.me>

## Game planning
+ Initialize player1Pennies and player2Pennies as 5 (i.e. HP pool)
+ Initialize coin states (heads/tails)
+ For proof of concept: Player 1 will be Evens, Player 2 will be Odds 
    - Note: Intend to refine so that P1 can choose Evens/Odds and coin face
+ WHILE P1/P2 HP != 0:
    - State round number
    - P1 randomly chooses heads/tails
    - P2 randomly chooses heads/tails
    - Compare P1/P2 coins
    - IF heads/heads OR tails/tails, decrement P2 HP, increase P1 HP -> next round
    - IF heads/tails, decrement P1 HP, increase P2 HP -> next round
    - Increase round number
+ Declare winner when P1 or P2 has 0 coins remaining

## Outside resources
+ Buck, S. (n.d.). /e2 Github Connect. https://hesweb.dev/e2/notes
+ Buck, S. (n.d.-b). War (card game) Simulator. https://hesweb.dev/files/e2p1-examples/war/
+ HTML: HyperText Markup Language | MDN. (2023, July 17). https://developer.mozilla.org/en-US/docs/Web/HTML
+ The PHP Group. (n.d.). PHP Manual. php. https://www.php.net/docs.php 
+ Wikipedia contributors. (2023). Matching pennies. Wikipedia. https://en.wikipedia.org/wiki/Matching_pennies

## Notes for instructor
+ I'm taking CS50 concurrently with this course, so the premise and scope of the code isn't too bad and I didn't need many external resources.
+ I'm truly, incredibly grateful your course isn't as disheartening as CS50. The lectures and notes are amazing! Everything is so logically and well organized! Thank you!