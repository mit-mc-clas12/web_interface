import json
from collections import OrderedDict


str = "[\n"
for files in ['stats_osg.json','stats_MIT.json','stats_jlab.json']:
	with open('../stats_results/'+files,'r') as jsondata:
		str += jsondata.readline()+",\n"

str = str[:-2]
str += "\n]"

writefile = open('../stats_results/stats.json','w')
writefile.write(str)
writefile.close()
