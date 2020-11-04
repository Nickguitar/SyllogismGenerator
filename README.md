# SyllogismGenerator
Simple PHP script that generate all the 256 possible syllogisms

## How it works

**1**. First, it generates all the possible combinations of three characters between the letters "A", "E", "I" and "O", each one representing a different categorical proposition. The result is something like ("AAA", "AAE", "AAO", ..., "EAI", "EAO", ..., "OOI", "OOO"). There are 64 (4³) possible combinations. Each of these trio is a mode of an syllogism.

**2**. Then, there are four functions, figura1($modo), figura2($modo), etc., one for each syllogism figure. Each of these functions receives a mode of syllogism as input (e.g. AII), generates an argument according to the correct figure and return the argument in natural language.
E.g. if the input is AII and it is the first figure, the output is "All M is P; Some S is M; Some S is P"). 

If the input is EIO and it is the third figure, the output is "No M is P; Some M é M; Some S is not P"). 

The argument is outputed as an array.

**3**. There is another function, silogismo($modoFigura), that receives a mode and a figure of argument as input. E.g. "AII-1". This means that this argument has AII as it's mode and is in the first figure. The function determines the figure of the argument and outputs the corresponding argument as a string (using one of the four previous functions). 

**4**. Finally, there is a loop that range over all the 64 possible modes of syllogism, and for each of them, there is another loop that generates the argument corresponding to each of the 4 figures of syllogism. This generates a table with 64x4=256 syllogisms.

## =)

You can change the value of the variables from line 25 to 33 as you want. 

Lines 31, 32 and 33 contains the major, middle and minor terms.

But notice that variables from line 25 to 29 have a constant logical meaning. If you want to change them, just translate them into your language. Don't change anything else or you may break something.
