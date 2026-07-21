import re
with open('c:/Users/Administrator/Desktop/ve-tinh/hc-vetinh-4/style.css', 'r', encoding='utf-8') as f:
    s = f.read()
s = re.sub(r'font-family:\s*"(light|title-italic|text|title)".*?;', '', s)
with open('c:/Users/Administrator/Desktop/ve-tinh/hc-vetinh-4/style.css', 'w', encoding='utf-8') as f:
    f.write(s)
print("Fonts removed!")
