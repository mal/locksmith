locksmith
=========

A simple idea for creating harder to crack passwords.

### Abstract

There's always a large amount of discussion about password hashing and it's implementation whenever a big (or small) site gets hacked, and their user data exposed. This discussion nearly always seems to revolve around hash functions, salts and various other aspects of cyptography.
These things are important, it's true, but there's much more that can be done **beyond** these.

`Locksmith` aims to make it easy to hash passwords in a unique way such that vanilla brute forcing cracking is no longer an option. It works by applying arbitrary transforms to the password after it's initally hashed, in way not only unique to your application, but also potentially unique to each user.

### Thoughts

While initially discussing this idea, a phrase was uttered that people rallied around "security through obscurity". An all to common occurance. While no one can deny obscurity alone is a bad idea, incorporating it into your solution is and should continue to be common practice. Some millitary facilities, for example, despite not skimping on security devices and personel, closely guard information about their exact whereabouts. It's not relied upon, but that's not the same as being worthless.

### Future

In theory it should be possible to have a process that periodically rescrables keys such that:

Day 1:
```
    Bit Read Order    1   2   3   4   5   6   7   8
    User 1 Key        1   1   0   1   1   0   1   1
    User 2 Key        0   1   1   1   1   1   0   1
```

Then after a scramble:

Day 2:
```
    Bit Read Order    3   8   1   5   6   2   7   4
    User 1 Key        0   1   1   1   0   1   1   1
    User 2 Key        1   1   0   1   1   1   0   1
```

This adds a rudimentary combination lock factor such that even if your user data and lock are compromised, the combination for the when the data was grabbed is still required in order to make the two work together.

Another idea might be to add a Bit XOR Order, which could specify that the 5th and 7th bit be inverted before being interpreted.

-

**WARNING**:

I am not a cryptographer. This is a brain dump of an idea. It has not and should not be implented in a real world application without proper and thorough testing.

-

_I may fill out this readme a bit more in future, but for now I think the best way to understand is to dive in! Shouldn't take you long!_

---

Copyright (C) 2012 Mal Graty &lt;mal.graty@googlemail.com&gt;

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.