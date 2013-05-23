# Checkout

Model and implement the checkout from a super market:

* Calculate the overall sum for a checkout
* An item is identified by a single letter (e.g. "A", "B", …)
* Each item has a defined price, e.g.
  * A = 30
  * B = 10
* The order is represented as a string of item identifiers (e.g. "ABBC")
  * Items may occur in arbitrary order
* You should also be able to scan several order strings in a row to combine them
  * e.g. "ABB", then "CB" and the resulting order is "ABBBC"
* There are additional rules that define extraordinary prices, e.g.
  * "Buy two A for 45"
  * "Buy three A and get one for free"
* Rules may change over time
  * e.g. every week
