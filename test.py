def brackets_match(expr):
    stack = []
    for char in expr:
        if char == ('('):
            stack.append(True)
        if char == (')'):
            if len(stack) > 0: return False
            stack.pop()
    if len(stack) > 0 : return False
    return True

print(brackets_match('((((1'))

