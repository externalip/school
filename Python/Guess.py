import random
lowest = int(input("Enter the lowest number: "))
highest = int(input("Enter the highest number: "))
secret_number = random.randint(lowest, highest)
print(f"Guess the number between {lowest} and {highest}!")
for chances in range(10, 0, -1):
    guess = int(input(f"Enter your guess ({lowest}-{highest}): "))
    if guess == secret_number:
        print("Congratulations! You guessed the correct number!")
        break
    print("Too low!" if guess < secret_number else "Too high!")
    print(f"You have {chances-1} chances left.")
else:
    print(f"Sorry, you ran out of chances. The secret number was {secret_number}.")