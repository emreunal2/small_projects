import nltk
import urllib
from bs4 import BeautifulSoup
from nltk.corpus import stopwords

# Getting url from user
print('input url')
url = input()

# Reading HTML and creating tokens
response = urllib.request.urlopen(url)
html = response.read()
soup = BeautifulSoup(html, "lxml")
text = soup.get_text(strip=True)
tokens = [t for t in text.split()]

# Removing stopwords from tokens
sr = stopwords.words('english')
clean_tokens = tokens[:]
for token in tokens:
    if token in sr:
        clean_tokens.remove(token)

# Printing clean tokens
freq = nltk.FreqDist(clean_tokens)
for key, val in freq.items():
    print(str(key) + ' used ' + str(val) + ' times')
freq.plot(10, cumulative=False)