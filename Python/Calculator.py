def add(a, b):
    return a + b
def diff(a, b):
    return a - b
def multi(a, b):
    return a * b
def div(a, b):
    return float(a / b)
def exp(a, b):
    return a ** b
def floor(a, b):
    return float(a // b)
def mod(a, b):
    return float(a % b)
def InputNum():
    a = int(input("First Number: "))
    b = int(input("Second Number: "))
    return a, b
math_functions = {
    1: add, 2: diff, 3: multi, 4: div, 5: exp, 6: floor, 7: mod
}
choice = int(input("1. Add\n2. Subtract\n3. Multiply\n4. Divide\n5. Exponent\n6. Floor Division\n7. Modulo\n"))
if choice == 69:
    print("Nice")
elif choice >= 9000:
    print("It's over 9K")
elif choice in range (1,8):
    a, b = InputNum()
    print("The answer is ", math_functions[choice](a, b))
else:
   print("Invalid Input")