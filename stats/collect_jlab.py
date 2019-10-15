import subprocess
import datetime
import re

currentDT = datetime.datetime.now()

a=subprocess.Popen("/site/scicomp/auger-slurm/bin/slurmHosts",stdout=subprocess.PIPE)
b= a.communicate()[0]
available=0
total=0
state='DEFAULT'
c=re.split('684|1563|771|308|332',b)
for i, array in enumerate(c):
	content=array.split()
	if i==0:
		state=content[-1]
		continue
	if len(content)==1:
		continue
	job=content[1]
	total=total+int(job.split('/')[1])
	if state=='IDLE' or state=='MIXED':
		available=available+int(job.split('/')[0])
	state=content[-1]


file = open(r"Sample_script_result_jlab","w")
file.write("Updated on "+currentDT.strftime("%Y-%m-%d %H:%M:%S"))
file.write("\nTotal cores: "+str(total))
file.write("\nBusy cores: "+str(total-available))
file.write("\nIdle cores: "+str(available))
file.close()