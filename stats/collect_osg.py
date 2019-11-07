import subprocess
import datetime

currentDT = datetime.datetime.now()

text=subprocess.Popen(['../stats_raw/osg/farmnodes.sh'], stdout=subprocess.PIPE)
string=text.communicate()[0]
array=string.split(' ',2)

dic =OrderedDict([('Total cores',array[0]),('Busy cores',array[1]),('Idle cores',array[2]),('timestamp',currentDT.strftime("%Y-%m-%d %H:%M:%S"))])
with open('../stats_results/stats_MIT.json', 'w') as outfile:
    json.dump(dic, outfile)