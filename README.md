locksmith
=========

A simple idea for creating harder to crack passwords.

### Abstract

There's always a large amount of discussion about password hashing and it's implementation whenever a big (or small) site gets hacked, and their user data exposed. This discussion nearly always seems to revolve around hash functions, salts and various other aspects of cyptography.
These things are important, it's true, but there's much more that can be done **beyond** these.

`Locksmith` aims to make it easy to hash passwords in a unique way such that vanilla brute forcing cracking is no longer an option. It works by applying arbitrary transforms to the password after it's initally hashed, in way not only unique to your application, but also potentially unique to each user.

-

I may fill out this readme a bit more in future, but for now I think the best way to understand is to dive into the code. Shouldn't take you long!