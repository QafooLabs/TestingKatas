# Train Reservation Kata

Inspired by: https://github.com/emilybache/KataTrainReservation

## Background

Railway operators aren't always known for their use of cutting edge
technology, and in this case they're a little behind the times. The
railway people want you to help them to improve their online booking
service. They'd like to be able to not only sell tickets online, but to
decide exactly which seats should be reserved, at the time of booking.

You're working on the "TicketOffice" service, and your next task is to
implement the feature for reserving seats on a particular train. The
railway operator has a service-oriented architecture, and both the
interface you'll need to fulfill, and some services you'll need to use
are already implemented.

All starting code is available in the Github repo.

## Business Rules around Reservations

There are various business rules and policies around which seats may be
reserved. For a train overall, no more than 70% of seats may be reserved
in advance, and ideally no individual coach should have no more than 70%
reserved seats either. However, there is another business rule that says
you must put all the seats for one reservation in the same coach. This
could make you and go over 70% for some coaches, just make sure to keep
to 70% for the whole train.

## Back end guideline

The "TicketOffice" should communicate with a back end service that keeps
information about all trains and their seats. The back end can provide a list
of all coaches of a specific train and their seats together with a status. For
example, it could return something like

```json
{"seats": {"1A": {"booking_reference": "", "seat_number": "1", "coach": "A"}, "2A": {"booking_reference": "", "seat_number": "2", "coach": "A"}}}
```
