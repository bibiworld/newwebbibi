#coding:utf-8
import urllib    
import urllib2      
import cookielib
import re	
import random

  
user_agent = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36',    
headers = { 'User-Agent' : user_agent 
			,'Referer' : 'http://dict.youdao.com/search'}    

cookiejar = cookielib.CookieJar()		
opener = urllib2.build_opener(urllib2.HTTPCookieProcessor(cookiejar)) 
urllib2.install_opener(opener)	
	
#url_pre = 'https://en.wikipedia.org/wiki/'	
url_pre = 'http://image.youdao.com/search?q='
url_suf = '&keyfrom=dict.top'

#
#	网站基本信息
#

def download(url, words):
	#if (url.count("https:") == 0) and (url.count("http:") == 0):
	#	url = "http:" + url
	
	if (url.count("jpg") > 0) or (url.count("JPG") > 0):
		filename = "{}.jpg".format(words)
	elif (url.count("png") > 0) or (url.count("PNG") > 0):
		filename = "{}.png".format(words)
	print "task {}".format(words), url
	refile, reheaders = urllib.urlretrieve(url, filename)
	print refile
	
def obtain(words):
	url = url_pre + words + url_suf
	req = urllib2.Request(url, headers = headers)
	try:
		response = urllib2.urlopen(req)  #接受反馈的信息  
	except:
		return
	page = response.read()
	myItems = re.findall('<img.*?src="(http://..\.so\.qhimg\.com.*?)".*?>',page,re.S)
	#maybe = "-" + words.lower()
	'''for item in myItems:
		if (item.count("upload") == 0):
			continue
		if (item.lower().count(maybe) > 0) and ((item.lower().count("jpg") > 0)\
		or (item.lower().count("png") > 0)):
			download(item, words)
			break
	'''
	if (len(myItems) > 0):
		while (True):
			url = myItems[random.randint(0, len(myItems) - 1)]
			urllower = url.lower()
			if (urllower.count("jpg") > 0)\
			or (urllower.count("png") > 0):
				download(url, words)
				break
			
if __name__ == "__main__":
	file = open("only")
	for i in range(0, 15328):
		words = file.readline().strip("\n")
		print i, words
		if (i < 6171) or (i >= 10000):
			continue
		obtain(words)
	
	