"""number = 10"""
"""if (1> number):
 print("hello pyhton")
else:
 print("get ur ass from here")

def square(number):
    return number ** 2

result = square(5)
print(f"The square of 5 is {result}")  
"""

"""import random
lookTap = "nigga \
    h"
def generate_mystery_numbers():
    return [random.randint(1, 100) for _ in range(10)]

numberCoosedFromMe = generate_mystery_numbers()

def numberFromList():
    return random.choice(numberCoosedFromMe)

def check_your_number(your_choice, numberthatGat):
    if your_choice == numberthatGat:
        return True, f"Your number {your_choice} is in the list!"
    else:
        return False, f"Your number {your_choice} is not in the list."

print(numberCoosedFromMe)

thisOne = numberFromList()

attempts = 3

while attempts > 0:
    try:
        user_input = int(input(f"Choose a number from the list (Attempts left: {attempts}): "))
        result, message = check_your_number(user_input, thisOne)
        print(message)
        
        if result: 
            break
        
        attempts -= 1 
    
    except ValueError:
        print("Invalid input. Please enter a valid number.")
        attempts -= 1  

if attempts == 0:
    print(f"You have run out of attempts. The correct number was {thisOne}.")"""

m = "I love Pepsi"
print(m[2])
print(m[5:])
print(m[::2])
print(m[0])
print(len(m))
print(m[2:8].capitalize())
print(m.casefold())
print(m.center(13, '*'))
# strip() rstrip() lstrip() remove space r for right l for left and the first is for both
# title() capitalize() title let every first charachter capital and fir the other one let first caracheter capitel 
#