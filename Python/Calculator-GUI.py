import tkinter as tk

def add(x, y):
    return x + y

def subtract(x, y):
    return x - y

def multiply(x, y):
    return x * y

def divide(x, y):
    if y == 0:
        return "Error: Cannot divide by zero"
    else:
        return x / y

def remainder(x, y):
    if y == 0:
        return "Error: Cannot divide by zero"
    else:
        return x % y

def exponent(x, y):
    return x ** y

def floor_divide(x, y):
    if y == 0:
        return "Error: Cannot divide by zero"
    else:
        return x // y

operations = {
    "Add": add,
    "Subtract": subtract,
    "Multiply": multiply,
    "Divide": divide,
    "Remainder": remainder,
    "Exponent": exponent,
    "Floor Divide": floor_divide
}

def create_calculator_gui():
    def calculate_with_operation(func):
        try:
            x = int(input1.get())
            y = int(input2.get())
        except ValueError:
            output.config(text="Error: Invalid input")
            return

        result = func(x, y)
        
        if isinstance(result, int):
            output_text = "Result: {}"
        elif isinstance(result, float) and result.is_integer():
            output_text = "Result: {:.0f}"
        else:
            output_text = "Result: {:.2f}"
            
        output.config(text=output_text.format(result))

    def clear_input_fields(*args):
        for arg in args:
            arg.delete(0, tk.END)

        output.config(text="")
        input1.focus()
    
    window = tk.Tk()
    window.title("Calculator")
    window.geometry("650x600")
    window.resizable(False,False)
    Font_tuple = ("Comic Sans MS", 20, "bold")

    title_label = tk.Label(window, text="Calculator Deez Nuts", font=Font_tuple)
    title_label.pack(side=tk.TOP, padx=10, pady=(20, 0))
    input1_label = tk.Label(window, text="Input 1:")
    input1_label.pack(side=tk.TOP, padx=10, pady=(20, 0))

    input1 = tk.Entry(window)
    input1.pack(side=tk.TOP, padx=10, pady=(0, 20))

    input2_label = tk.Label(window, text="Input 2:")
    input2_label.pack(side=tk.TOP, padx=10, pady=(20, 0))

    input2 = tk.Entry(window)
    input2.pack(side=tk.TOP, padx=10, pady=(0, 20))

    button_frame = tk.Frame(window)
    button_frame.pack(side=tk.TOP, padx=10, pady=(20, 0))

    button_config = {"width": 10, "height": 2}

    for i, (operation_name, operation_func) in enumerate(operations.items()):
        operation_button = tk.Button(button_frame, text=operation_name, command=lambda func=operation_func: calculate_with_operation(func), **button_config)
        operation_button.grid(row=i//3, column=i%3, padx=5, pady=5)

    output = tk.Label(window, text="",font=Font_tuple)
    output.pack(padx=10, pady=(20, 0))

    clear_button = tk.Button(window, text="Clear", command=lambda: clear_input_fields(input1, input2), **button_config)
    clear_button.pack(padx=10, pady=(20, 0))

    input1.focus()

    window.mainloop()

if __name__ == "__main__":
    create_calculator_gui()